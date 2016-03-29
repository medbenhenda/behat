Feature: Basket
  Check that the basket is runing

  Scenario: An empty basket
    Given An empty basket
    Then the basket price is 0 $

  Scenario: Multiple products are added to the basket
    Given An empty basket
    And A product costing 5 $ is added to the basket
    And A product costing 15 $ is added to the basket
    Then The basket price is 20 $