Feature: Registering a command by an extension
  As a developer
  I want to register a command by an extension
  So I can run custom commands

  Scenario: Register a command by extension
    Given there is a config file with:
      """
      extensions:
          PhpZone\PhpZone\Example\Example1Extension: ~

      """
    And there is a class in the "src/Example/Example1Extension.php" with:
      """
      <?php

      namespace PhpZone\PhpZone\Example;

      use PhpZone\PhpZone\Extension\AbstractExtension;
      use Symfony\Component\DependencyInjection\ContainerBuilder;
      use Symfony\Component\DependencyInjection\Definition;

      class Example1Extension extends AbstractExtension
      {
          public function load(array $config, ContainerBuilder $container)
          {
              $definition = new Definition('Symfony\Component\Console\Command\Command');
              $definition->setArguments(array('example:command:1'));
              $definition->addTag('command');
              $container->setDefinition('example.command_1', $definition);
          }
      }

      """
    When I run phpzone
    Then I should have "example:command:1" command
