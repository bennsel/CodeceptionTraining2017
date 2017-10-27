Feature: jersey designer
  In order to order an individually designed jersey
  As an GermanWerderUser
  I need to have the option to choose the name And number on the jersey

  Background:
    Given am on shop page

  Scenario: see the jersey designer with all elements
    Then I see element "jersey designer"
    And I see in "jersey designer" element "jersey preview"
    And I see in "jersey designer" text "GESTALTE DEIN TRIKOT"
    And I see in "jersey designer" element "tab home"
    And I see in "jersey designer" element "tab away"
    And I see in "jersey designer" element "tab event"
    And I see in "jersey designer" element "tab torwart"

  Scenario: home tab is preselected
    Then I see link "HOME" is active
    And I see element "home jersey picture"

  Scenario: select away tab
    When I press link "tab away"
    Then I see element "away jersey picture"
    And I see link "AWAY" is active

  Scenario: individual options are shown on jersey preview
    When I select option "flock option" with "Individueller Flock  (+15,00 €)"
    And I fill field "number" with "0"
    And I fill field "name" with "Tester"
    Then I see in "jersey preview" element "number 0"
    And I see in "jersey preview" text "Tester"

  Scenario: add to cart
    Given I press link "tab away"
    And I see link "AWAY" is active
    When I select option "size option" with "2XL"
    And I select option "flock option" with "Individueller Flock  (+15,00 €)"
    And I fill field "number" with "00"
    And I fill field "name" with "Tester"
    And I select option "logo option" with "Liga Logo  (+2,50 €)"
    And I press button "IN MEINEN WARENKORB"
    Then I see in current url "checkout/cart/"
    And I see text "Trikot Away 2017/18 wurde in den Warenkorb gelegt."
    And I see text "Variante: 2XL"
    And I see text "Beflockung: Tester 00"
    And I see text "Logos: Liga Logo"
    And I see text "102,45 €"