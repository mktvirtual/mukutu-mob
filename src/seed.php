<?php
/**
 * Conteudo das secoes que repetem, extraido do proprio prototipo.
 *
 * Cada bloco que repete e um post type (ACF free nao tem repeater), entao uma
 * instalacao nova mostra curso, depoimento e FAQ vazios ate existirem posts.
 * Localmente eles foram criados a mao no wp-admin; aqui o texto vem do
 * prototipo para que a home remota seja comparavel com proto.mukutu.cloud.
 *
 * Idempotente: casa pelo titulo e nao duplica.
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	exit;
}

$mukutu_seed = json_decode( <<<'JSON'
{
 "curso": [
  {
   "title": "Gestão de Negócios: Tecnologia e Transformação Digital",
   "tag": "MBA",
   "link": "#footer"
  },
  {
   "title": "Tecnologias Emergentes, Transformação Digital e Agilidade em Negócios",
   "tag": "Pós-graduação",
   "link": "#footer"
  }
 ],
 "depoimento": [
  {
   "title": "Nome do Aluno",
   "content": "O formato digital me deu a autonomia que eu precisava para conciliar a rotina de diretoria com os estudos, sem perder a profundidade de discussão que só a FIA entrega.",
   "curso": "MBA em Gestão Estratégica",
   "cargo": "Diretor de Operações"
  },
  {
   "title": "Nome do Aluno",
   "content": "Consegui aplicar o conteúdo na semana seguinte a cada módulo. A discussão com professores e colegas de outras indústrias mudou a forma como eu enxergo os problemas da minha área.",
   "curso": "Pós-graduação em Transformação Digital",
   "cargo": "Gerente de Produto"
  },
  {
   "title": "Nome do Aluno",
   "content": "Entrei buscando repertório técnico e saí com uma visão de liderança muito mais clara. Estudar no meu ritmo foi o que tornou possível concluir sem abrir mão da carreira.",
   "curso": "MBA em Inteligência Artificial e Negócios",
   "cargo": "Head de Dados"
  }
 ],
 "faq": [
  {
   "title": "Qual é o diferencial do diploma da FIA Digital?",
   "content": "O seu diploma tem o mesmo peso, validade e rigor acadêmico dos cursos presenciais da FIA, instituição com nota máxima no MEC e reconhecimento internacional."
  },
  {
   "title": "Como funcionam as aulas e a plataforma de ensino?",
   "content": "Você estuda com total autonomia através da plataforma Canvas LMS, o padrão global das grandes escolas de negócios. As aulas combinam teoria sólida com a resolução de problemas práticos do mercado."
  },
  {
   "title": "Os cursos são focados em quais áreas?",
   "content": "Oferecemos Cursos Superiores de Tecnologia (Graduação Tecnológica), Pós-graduações e MBAs focados nas maiores frentes de transformação do mercado atual, como liderança digital, tecnologia, finanças e sustentabilidade."
  }
 ]
}
JSON
, true );

foreach ( $mukutu_seed as $type => $items ) {
	foreach ( $items as $order => $item ) {
		$existing = get_page_by_title( $item['title'], OBJECT, $type );
		$id       = $existing ? $existing->ID : 0;
		$postarr  = array(
			'post_type'    => $type,
			'post_title'   => $item['title'],
			'post_content' => isset( $item['content'] ) ? $item['content'] : '',
			'post_status'  => 'publish',
			'menu_order'   => $order,
		);
		if ( $id ) {
			$postarr['ID'] = $id;
			wp_update_post( $postarr );
		} else {
			$id = wp_insert_post( $postarr );
		}
		foreach ( $item as $field => $value ) {
			if ( in_array( $field, array( 'title', 'content' ), true ) ) {
				continue;
			}
			update_field( $field, $value, $id );
		}
		WP_CLI::log( sprintf( '%s: %s (#%d)', $type, $item['title'], $id ) );
	}
}
