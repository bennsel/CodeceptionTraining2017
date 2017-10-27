Feature: News
  In order to read news
  As an GermanWerderUser
  I need to see news items

  Scenario: try News
    Given am on web page
    When I see text "WERDER NEWS"
    Then I count "8" elements ".c-news-tile"