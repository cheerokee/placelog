<?php
return [
    'router' => [
        'routes' => [
            'api.rest.doctrine.city' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/city[/:city_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\City\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.event-address' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/event-address[/:event_address_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\EventAddress\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.state' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/state[/:state_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\State\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.event-addresses' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/event-addresses[/:event_addresses_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\EventAddresses\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.event' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/event[/:event_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\Event\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.category-image' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/category-image[/:category_image_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\CategoryImage\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.image' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/image[/:image_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\Image\\Controller',
                    ],
                ],
            ],
            'api.rest.doctrine.exercice' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/exercice[/:exercice_id]',
                    'defaults' => [
                        'controller' => 'api\\V1\\Rest\\Exercice\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'api.rest.doctrine.city',
            1 => 'api.rest.doctrine.event-address',
            2 => 'api.rest.doctrine.state',
            3 => 'api.rest.doctrine.event-addresses',
            4 => 'api.rest.doctrine.event',
            5 => 'api.rest.doctrine.category-image',
            6 => 'api.rest.doctrine.image',
            7 => 'api.rest.doctrine.exercice',
        ],
    ],
    'zf-rest' => [
        'api\\V1\\Rest\\City\\Controller' => [
            'listener' => \api\V1\Rest\City\CityResource::class,
            'route_name' => 'api.rest.doctrine.city',
            'route_identifier_name' => 'city_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'city',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '2000',
            'page_size_param' => null,
            'entity_class' => \Register\Entity\City::class,
            'collection_class' => \api\V1\Rest\City\CityCollection::class,
            'service_name' => 'City',
        ],
        'api\\V1\\Rest\\EventAddress\\Controller' => [
            'listener' => \api\V1\Rest\EventAddress\EventAddressResource::class,
            'route_name' => 'api.rest.doctrine.event-address',
            'route_identifier_name' => 'event_address_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'event_address',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Event\\Entity\\EventAddress',
            'collection_class' => \api\V1\Rest\EventAddress\EventAddressCollection::class,
            'service_name' => 'EventAddress',
        ],
        'api\\V1\\Rest\\State\\Controller' => [
            'listener' => \api\V1\Rest\State\StateResource::class,
            'route_name' => 'api.rest.doctrine.state',
            'route_identifier_name' => 'state_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'state',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Register\Entity\State::class,
            'collection_class' => \api\V1\Rest\State\StateCollection::class,
            'service_name' => 'State',
        ],
        'api\\V1\\Rest\\EventAddresses\\Controller' => [
            'listener' => \api\V1\Rest\EventAddresses\EventAddressesResource::class,
            'route_name' => 'api.rest.doctrine.event-addresses',
            'route_identifier_name' => 'event_addresses_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'event_addresses',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
                3 => 'PUT',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '1000',
            'page_size_param' => null,
            'entity_class' => 'Event\\Entity\\EventAddresses',
            'collection_class' => \api\V1\Rest\EventAddresses\EventAddressesCollection::class,
            'service_name' => 'EventAddresses',
        ],
        'api\\V1\\Rest\\Event\\Controller' => [
            'listener' => \api\V1\Rest\Event\EventResource::class,
            'route_name' => 'api.rest.doctrine.event',
            'route_identifier_name' => 'event_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'event',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Event\\Entity\\Event',
            'collection_class' => \api\V1\Rest\Event\EventCollection::class,
            'service_name' => 'Event',
        ],
        'api\\V1\\Rest\\CategoryImage\\Controller' => [
            'listener' => \api\V1\Rest\CategoryImage\CategoryImageResource::class,
            'route_name' => 'api.rest.doctrine.category-image',
            'route_identifier_name' => 'category_image_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'category_image',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Register\Entity\CategoryImage::class,
            'collection_class' => \api\V1\Rest\CategoryImage\CategoryImageCollection::class,
            'service_name' => 'CategoryImage',
        ],
        'api\\V1\\Rest\\Image\\Controller' => [
            'listener' => \api\V1\Rest\Image\ImageResource::class,
            'route_name' => 'api.rest.doctrine.image',
            'route_identifier_name' => 'image_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'image',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Register\Entity\Image::class,
            'collection_class' => \api\V1\Rest\Image\ImageCollection::class,
            'service_name' => 'Image',
        ],
        'api\\V1\\Rest\\Exercice\\Controller' => [
            'listener' => \api\V1\Rest\Exercice\ExerciceResource::class,
            'route_name' => 'api.rest.doctrine.exercice',
            'route_identifier_name' => 'exercice_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'exercice',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Activities\Entity\Exercice::class,
            'collection_class' => \api\V1\Rest\Exercice\ExerciceCollection::class,
            'service_name' => 'Exercice',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'api\\V1\\Rest\\City\\Controller' => 'HalJson',
            'api\\V1\\Rest\\EventAddress\\Controller' => 'HalJson',
            'api\\V1\\Rest\\State\\Controller' => 'HalJson',
            'api\\V1\\Rest\\EventAddresses\\Controller' => 'HalJson',
            'api\\V1\\Rest\\Event\\Controller' => 'HalJson',
            'api\\V1\\Rest\\CategoryImage\\Controller' => 'HalJson',
            'api\\V1\\Rest\\Image\\Controller' => 'HalJson',
            'api\\V1\\Rest\\Exercice\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'api\\V1\\Rest\\City\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\EventAddress\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\State\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\EventAddresses\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\Event\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\CategoryImage\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\Image\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'api\\V1\\Rest\\Exercice\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'api\\V1\\Rest\\City\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\EventAddress\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\State\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\EventAddresses\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\Event\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\CategoryImage\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\Image\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
            'api\\V1\\Rest\\Exercice\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Register\Entity\City::class => [
                'route_identifier_name' => 'city_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.city',
                'hydrator' => 'api\\V1\\Rest\\City\\CityHydrator',
            ],
            \api\V1\Rest\City\CityCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.city',
                'is_collection' => true,
            ],
            'Event\\Entity\\EventAddress' => [
                'route_identifier_name' => 'event_address_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event-address',
                'hydrator' => 'api\\V1\\Rest\\EventAddress\\EventAddressHydrator',
            ],
            \api\V1\Rest\EventAddress\EventAddressCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event-address',
                'is_collection' => true,
            ],
            \Register\Entity\State::class => [
                'route_identifier_name' => 'state_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.state',
                'hydrator' => 'api\\V1\\Rest\\State\\StateHydrator',
            ],
            \api\V1\Rest\State\StateCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.state',
                'is_collection' => true,
            ],
            'Event\\Entity\\EventAddresses' => [
                'route_identifier_name' => 'event_addresses_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event-addresses',
                'hydrator' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator',
            ],
            \api\V1\Rest\EventAddresses\EventAddressesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event-addresses',
                'is_collection' => true,
            ],
            'Event\\Entity\\Event' => [
                'route_identifier_name' => 'event_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event',
                'hydrator' => 'api\\V1\\Rest\\Event\\EventHydrator',
            ],
            \api\V1\Rest\Event\EventCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.event',
                'is_collection' => true,
            ],
            \Register\Entity\CategoryImage::class => [
                'route_identifier_name' => 'category_image_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.category-image',
                'hydrator' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator',
            ],
            \api\V1\Rest\CategoryImage\CategoryImageCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.category-image',
                'is_collection' => true,
            ],
            \Register\Entity\Image::class => [
                'route_identifier_name' => 'image_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.image',
                'hydrator' => 'api\\V1\\Rest\\Image\\ImageHydrator',
            ],
            \api\V1\Rest\Image\ImageCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.image',
                'is_collection' => true,
            ],
            \Activities\Entity\Exercice::class => [
                'route_identifier_name' => 'exercice_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.exercice',
                'hydrator' => 'api\\V1\\Rest\\Exercice\\ExerciceHydrator',
            ],
            \api\V1\Rest\Exercice\ExerciceCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.doctrine.exercice',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \api\V1\Rest\City\CityResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\City\\CityHydrator',
            ],
            \api\V1\Rest\EventAddress\EventAddressResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\EventAddress\\EventAddressHydrator',
            ],
            \api\V1\Rest\State\StateResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\State\\StateHydrator',
            ],
            \api\V1\Rest\EventAddresses\EventAddressesResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator',
            ],
            \api\V1\Rest\Event\EventResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\Event\\EventHydrator',
            ],
            \api\V1\Rest\CategoryImage\CategoryImageResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator',
            ],
            \api\V1\Rest\Image\ImageResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\Image\\ImageHydrator',
            ],
            \api\V1\Rest\Exercice\ExerciceResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'api\\V1\\Rest\\Exercice\\ExerciceHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'api\\V1\\Rest\\City\\CityHydrator' => [
            'entity_class' => \Register\Entity\City::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\EventAddress\\EventAddressHydrator' => [
            'entity_class' => 'Event\\Entity\\EventAddress',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\State\\StateHydrator' => [
            'entity_class' => \Register\Entity\State::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\EventAddresses\\EventAddressesHydrator' => [
            'entity_class' => 'Event\\Entity\\EventAddresses',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\Event\\EventHydrator' => [
            'entity_class' => 'Event\\Entity\\Event',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\CategoryImage\\CategoryImageHydrator' => [
            'entity_class' => \Register\Entity\CategoryImage::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\Image\\ImageHydrator' => [
            'entity_class' => \Register\Entity\Image::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'api\\V1\\Rest\\Exercice\\ExerciceHydrator' => [
            'entity_class' => \Activities\Entity\Exercice::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'api\\V1\\Rest\\City\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\City\\Validator',
        ],
        'api\\V1\\Rest\\EventAddress\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\EventAddress\\Validator',
        ],
        'api\\V1\\Rest\\State\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\State\\Validator',
        ],
        'api\\V1\\Rest\\EventAddresses\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\EventAddresses\\Validator',
        ],
        'api\\V1\\Rest\\Event\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\Event\\Validator',
        ],
        'api\\V1\\Rest\\CategoryImage\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\CategoryImage\\Validator',
        ],
        'api\\V1\\Rest\\Image\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\Image\\Validator',
        ],
        'api\\V1\\Rest\\Exercice\\Controller' => [
            'input_filter' => 'api\\V1\\Rest\\Exercice\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'api\\V1\\Rest\\City\\Validator' => [
            0 => [
                'name' => 'updatedAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'createdAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'code',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
        ],
        'api\\V1\\Rest\\EventAddress\\Validator' => [
            0 => [
                'name' => 'street',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'number',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'zipCode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'neighborhood',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
        ],
        'api\\V1\\Rest\\State\\Validator' => [
            0 => [
                'name' => 'updatedAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'createdAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'uf',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 10,
                        ],
                    ],
                ],
            ],
        ],
        'api\\V1\\Rest\\EventAddresses\\Validator' => [
            0 => [
                'name' => 'startAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'finishAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'active',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'observation',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'api\\V1\\Rest\\Event\\Validator' => [
            0 => [
                'name' => 'updatedAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'createdAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'active',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'title',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'description',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'api\\V1\\Rest\\CategoryImage\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'chave',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
        ],
        'api\\V1\\Rest\\Image\\Validator' => [
            0 => [
                'name' => 'title',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'image',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 225,
                        ],
                    ],
                ],
            ],
        ],
        'api\\V1\\Rest\\Exercice\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'description',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'video',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'updatedAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'createdAt',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
];
