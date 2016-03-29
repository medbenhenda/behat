Feature: Find contacts from User table
  In order to invite freinds in User table
  I should find users from User table

  Scenario:
    Given I am logged in as "cocos.mihai2003@gmail.com"
    When I call find contacts
    Then Address mail returned are ['med@gmail.com', 'med@yahoo.com']