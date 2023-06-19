# Drupal Frontend Exercises Solutions
# Note: More details can be founded in [dependency_injection_exercise](https://github.com/mashot7/drupal-front-and-back-exercises/tree/main/web/modules/custom/dependency_injection_exercise) custom module and [rocketship_theme_starter](https://github.com/mashot7/drupal-front-and-back-exercises/tree/main/web/themes/custom/rocketship_theme_starter) custom theme README files.

Every exercise solution is committed separately. E.g. exercise 1: "DFE: Exercise 1" and etc.

Branch: `drupal-frontent-exercise`

1. Created: `config/sync/block.block.infoblock.yml`, `config/sync/block_content.type.info.yml`, `config/sync/core.entity_form_display.block_content.info.default.yml`, `config/sync/core.entity_view_display.block_content.info.default.yml`, `config/sync/field.field.block_content.info.field_link.yml`, `config/sync/field.field.block_content.info.field_long_text.yml`, `config/sync/field.storage.block_content.field_link.yml`, and `config/sync/field.storage.block_content.field_long_text.yml`

2. Created: `web/themes/custom/rocketship_theme_starter/templates/block--info.html.twig`
   Modified: `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.theme`

3. Modified: `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.theme`

4. Created: `web/themes/custom/rocketship_theme_starter/templates/field--field-link--info.html.twig`
   Modified: `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.theme`

5. Created: `web/themes/custom/rocketship_theme_starter/js/block-info-link.js`, `web/themes/custom/rocketship_theme_starter/js/block-info.js`, and `web/themes/custom/rocketship_theme_starter/js/helpers.js`
   Modified: `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.info.yml`, `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.libraries.yml`, and `web/themes/custom/rocketship_theme_starter/rocketship_theme_starter.theme`

6. Modified: `web/themes/custom/rocketship_theme_starter/components/00-theme/01-atoms/01-links/00-link/_link.scss` and `web/themes/custom/rocketship_theme_starter/components/01-content-blocks/02-molecules/00-content-block/_00-content-block.scss`

# Dependency Injection Exercises Solutions

Every exercise solution is committed separately. E.g. exercise 1: "DIE: Exercise 1" and etc.

Branch: `dependency-injection-exercise`

1. Created: `src/Services/FetchPhotoService.php`, and `dependency_injection_exercise.services.yml`
   Modified: `src/Controller/RestOutputController.php`, and `src/Plugin/Block/RestOutputBlock.php`

2. Created: `src/Services/MailManager.php`, `src/DependencyInjectionExerciseServiceProvider.php`, and `dependency_injection_exercise.module`

3. Modified։ `dependency_injection_exercise.routing.yml`, `src/Controller/RestOutputController.php`, and `dependency_injection_exercise.module`

4. Created: `src/LanguageManager.php`
   Modified: `dependency_injection_exercise.services.yml`
