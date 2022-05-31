# CU Advancement Giving Platform

This site lives at https://giving.cu.edu and powers the online giving experience for the University of Colorado.

A complimentary user guide exists at https://github.com/CUCentralAdvancement/giving-site-user-guide, but this repository will only cover the codebase and maintainence. 

**Note:** The project and this readme will practice "Readme-driven-development" where everything is written as if the project is launched, but for some time, a lot of the sections will be inaccurate while code is being developed.

## Philosophies

The Giving site's features can be broken down into a set of concerns that need to adhere to tenants during development in order to end up with the simplest, most straightforward application codebase possible.

Since this is a Drupal application written in PHP, JS, and Twig, we will use best practices for each of those projects.

- Drupal best practices - 
- JS best practices - 
- PHP best practices - PSR-2...
- Twig best practices - 

### Concerns

- Forms - We will use Webform to create all forms including the "add to cart" and checkout forms. When it makes sense, we will update the guidance to use Drupal's Form API if the submission isn't needed.
- Users - We will use SAML-related modules to connect to PingFederate SSO. It would be good to use the `user_external_invite` module to invite users, but initially we will just have them create an account by going to https://giving.cu.edu/user and choosing to login as CU staff.
- Theming - We will use a series of template overrides, theme suggestions, and template preprocess functions to provide the theming layer. 
  - Chrome - CSS for the general theme regions and layout will live in the theme.
  - Components - CSS for page components will live in the template or in a CSS file located by the template...the `libraries.yml` file approach might be used so long as the CSS/JS aggregation works.
  - Pages - CSS for pages will be injected via the Asset Injector module
- Layouts - 
  - Chrome - The general layout will use the block layout UI.
  - Components - Components in the content area of nodes will use Layout Paragraphs.
  - Pages - Layout Builder will be used for general layout of structured node and unstructured landing pages.
- Media - We will use Pantheon's filesystem to store media.
  - We will use Drupal Core's Media library for any image, file, or video field.
- Search - We will use Pantheon's Solr service for search

---

## Pantheon Upstream Notice

This is Pantheon's recommended starting point for forking new [Drupal](https://www.drupal.org/) upstreams
that work with the Platform's Integrated Composer build process. It is also the
Platform's standard Drupal 9 upstream.

Unlike with earlier Pantheon upstreams, files such as Drupal Core that you are
unlikely to adjust while building sites are not in the main branch of the 
repository. Instead, they are referenced as dependencies that are installed by
Composer.

For more information and detailed installation guides, please visit the
Integrated Composer Pantheon documentation: https://pantheon.io/docs/integrated-composer

## Contributing

Contributions are welcome in the form of GitHub pull requests. However, the
`pantheon-upstreams/drupal-composer-managed` repository is a mirror that does not
directly accept pull requests.

Instead, to propose a change, please fork [pantheon-systems/drupal-composer-managed](https://github.com/pantheon-systems/drupal-composer-managed)
and submit a PR to that repository.
