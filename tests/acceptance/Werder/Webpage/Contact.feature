Feature: Contact
  In order to read news
  As an GermanWerderUser
  I need to see news items

  Background:
    Given am on web page

  Scenario: see footer item Kontakt
    Then I see text "Kontakt" in "footer"


  Scenario: see contact page after pressing footer item Kontakt
    When I press link "Kontakt" in "footer"
    Then I see in current url "/service/kontakt/"
    And I see text "Kontakt" in "main area"
    And I see text "Kontaktformular" in "main area"

  Scenario: send empty contact formular and see error messages
    And I press link "Kontakt" in "footer"
    When I press button "Absenden"
    Then I see "error message" for field "Vorname" with "Dieses Feld darf nicht leer bleiben, bitte fülle es aus."
    And I see "error message" for field "Nachname" with "Dieses Feld darf nicht leer bleiben, bitte fülle es aus."
    And I see "error message" for field "E-Mail" with "Dieses Feld darf nicht leer bleiben, bitte fülle es aus."
    And I see "error message" for field "Nachricht" with "Dieses Feld darf nicht leer bleiben, bitte fülle es aus."
    And I see "error message" for field "captcha" with "Code stimmt nicht überein"


  Scenario: send filled contact formular except captcha and see only captcha error message
    And I press link "Kontakt" in "footer"
    And I fill field "Vorname" with "Peter"
    And I fill field "Nachname" with "Meier"
    And I fill field "E-Mail" with "p.meier@example.de"
    And I fill field "Nachricht" with "no comment"
    And I press button "Absenden"
    Then I dont see "error message" for field "Vorname"
    And I dont see "error message" for field "Nachname"
    And I dont see "error message" for field "E-Mail"
    And I dont see "error message" for field "Nachricht"
    And I see "error message" for field "captcha" with "Code stimmt nicht überein"
    And I see text "Peter" in field "Vorname"
    And I see text "Meier" in field "Nachname"
    And I see text "p.meier@example.de" in field "E-Mail"
    And I see text "no comment" in field "Nachricht"
