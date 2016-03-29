<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use App\Basket;
use App\Product;
use App\User;
use App\Service;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given An empty basket
     */
    public function anEmptyBasket()
    {
        $this->basket = new Basket();
    }

    /**
     * @Then the basket price is :arg1 $
     */
    public function theBasketPriceIs($arg1)
    {
        if ($this->basket->price() != $arg1) {
            throw new \Exception('The expected price does not match the given price');
        }
    }

    /**
     * @Given A product costing :price $ is added to the basket
     */
    public function aProductCostingIsAddedToTheBasket($price)
    {
        $product = new Product($price);
        $this->basket->add($product);
    }

    /**
     * @Given I am logged in as :email
     */
    public function iAmLoggedInAs($email)
    {
        $this->user = new User($email);
        if (!$this->user) {
            throw new \Exception('No user matches '.$email);
        }
    }


    /**
     * @When I call find contacts
     */
    public function iCallFindContacts()
    {
        $this->service = new Service($this->user);
        if ($this->service) {
            $this->service->findAllContacts();
        } else {
            throw new \Exception('No user exist ');
        }
    }

    /**
     * @Then Address mail returned are [:arg1, :arg2]
     */
    public function addressMailReturnedAre($arg1, $arg2)
    {
        $aEmails = array();
        if ($this->service) {
            foreach ($this->service->getAUsers() as $user) {
                $aEmails[] = $user->getEmail();
            }

        } else {
            throw new \Exception('failed authentication');
        }

        if (count(array_diff($aEmails, array($arg1, $arg2)))) {
            throw new \Exception('Unexpected result');
        }
    }




}
