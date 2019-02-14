<?php

namespace FernleafSystems\ApiWrappers\Email\GetResponse\Accounts;

/**
 * Class AccountVO
 * @package FernleafSystems\ApiWrappers\Email\GetResponse\Accounts
 * @property string accountId
 * @property string email
 * @property string firstName
 * @property string lastName
 * @property string phone
 * @property string companyName
 * @property string state
 * @property string city
 * @property string street
 * @property string zipCode
 * @property array  countryCode
 * @property string timeFormat
 */
class AccountVO {

	use \FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;
}