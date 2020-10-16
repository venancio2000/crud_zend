<?php
return array(
	'router' => array (
		'routes' => array(
			'application' => array (
				'type' => 'Segment',
				'options' => array (
					'route' => '/[:controller[/:action[/:id]]]',
					'constraints' => array (
						'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
						 'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						 'id' => '[0-9]*',
					),
					'defaults' => array (
						'__NAMESPACE__' => 'Funcionario\Controller',
						'controller' => 'Index',
						'action' => 'Index'
					),
				),
			),
		),
	),
	'controllers' => array (
		'invokables' => array(
			'Funcionario\Controller\Index' => 'Funcionario\Controller\IndexController'
		)
	),
	'view_manager' => array(
		'template_path_stack' => array (
			__DIR__.'/../view',
		),
		'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            
		),
		
	),
	'doctrine' => array(
		'driver' => array(
		  'application_entities' => array(
			'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
			'cache' => 'array',
			'paths' => array(__DIR__ . '/../src/Funcionario/Entity')
		  ),

		  'orm_default' => array(
			  'drivers' => array(
				  'Funcionario\Entity' => 'application_entities'
			 	),
		  	),
	  	),
  	),
);



