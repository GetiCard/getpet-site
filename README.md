# Getpet — landing page

Landing page do **Getpet**, a identidade digital para pets (tag com NFC e QR Code, cartão do pet, GetPet Saúde e GetPet Vet). Uma solução Geti Company · tecnologia Getcard.

## Requisitos

- PHP 8.0 ou superior (sem extensões extras, sem banco de dados, sem build).

## Rodar localmente

```bash
php -S localhost:8000
```

Abra http://localhost:8000.

## Onde editar

| O quê | Arquivo |
|---|---|
| Número do WhatsApp, mensagens prontas, link do app, Instagram, e-mail | `config.php` |
| Modelos de tag (nome, descrição, recursos, mensagem do WhatsApp) | `config.php` → `models` |
| URL pública do site (para a prévia ao compartilhar no WhatsApp/redes) | `config.php` → `site_url` |
| Textos de cada seção | `partials/<seção>.php` |
| Cores, fontes e estilos | `assets/css/style.css` (tokens no início do arquivo) |

Ao publicar, preencha `site_url` (ex.: `https://getpet.com.br`) para que a imagem de compartilhamento (`og:image`) use o endereço completo.

## Estrutura

```
index.php          monta a página
config.php         configuração editável
lib/helpers.php    e() (escape HTML) e wa_link() (link do WhatsApp)
partials/          uma seção por arquivo + ilustrações (tag, QR, pet de exemplo)
assets/            CSS, JS e imagens
tests/             testes em PHP puro
docs/superpowers/  spec e plano de implementação
```

## Testes

```bash
php tests/helpers_test.php
php tests/render_test.php
```

## Publicar

Envie os arquivos para qualquer hospedagem com PHP 8 (cPanel, Hostinger, Locaweb etc.). Não é necessário enviar `docs/`, `tests/` nem os arquivos originais da raiz (`logo - *.jpeg`, `Portifólio - Getpet.pdf`).
