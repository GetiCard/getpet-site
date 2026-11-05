<?php
declare(strict_types=1);

/*
 * Configuração da landing page do Getpet.
 * Edite aqui o número do WhatsApp, as mensagens prontas e os links.
 */
return [
    // Número com DDI + DDD, só dígitos (máscaras também são aceitas).
    'whatsapp' => '5598983471218',
    'wa_message' => 'Olá! Quero conhecer a tag do Getpet para o meu pet 🐾',

    'app_url' => 'https://getpet.digital/login',
    'instagram' => 'geticompany',
    'support_email' => 'suporte@getcard.digital',

    // URL pública desta landing (usada no og:url). Vazio = omitir.
    'site_url' => '',

    'models' => [
        [
            'id' => 'basic',
            'name' => 'GetPet Basic',
            'tagline' => 'Identificação prática e acessível.',
            'features' => [
                'Tag em formato de osso',
                'Identificação via QR Code',
                'Perfil digital com seus contatos',
            ],
            'color' => 'orange',
            'badge' => null,
            'message' => 'Olá! Tenho interesse na tag GetPet Basic do Getpet 🐾',
        ],
        [
            'id' => 'nfc',
            'name' => 'GetPet NFC',
            'tagline' => 'Identificação inteligente com mais praticidade.',
            'features' => [
                'Tag redonda',
                'Identificação por aproximação (NFC)',
                'Também funciona via QR Code',
            ],
            'color' => 'green',
            'badge' => null,
            'message' => 'Olá! Tenho interesse na tag GetPet NFC do Getpet 🐾',
        ],
        [
            'id' => 'location',
            'name' => 'GetPet Localização',
            'tagline' => 'Identificação completa e localização do seu pet.',
            'features' => [
                'NFC e QR Code',
                'Localização por Bluetooth em redes colaborativas (Apple Find My e Android Find Hub)',
                'Sinal sonoro para ajudar na procura',
            ],
            'color' => 'cyan',
            'badge' => 'Mais completo',
            'message' => 'Olá! Tenho interesse na tag GetPet Localização do Getpet 🐾',
        ],
    ],
];
