<?php
/*
 * Copyright (c) 2013 - 2020 MasterCard International Incorporated
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 */

use Rak\Simplify\SimplifyFiles\SimplifyObject;
use Rak\Simplify\SimplifyFiles\SimplifyPaymentsApi;

class Simplify_FraudCheck extends SimplifyObject {
    /**
     * Creates an Simplify_FraudCheck object
     * @param     array $hash a map of parameters; valid keys are:<dl style="padding-left:10px;">
     *     <dt><tt>amount</tt></dt>    <dd>Amount of the transaction to be checked for fraud (in the smallest unit of your currency). Example: 100 = $1.00. This field is required if using “full” or “advanced” mode. </dd>
     *     <dt><tt>card.addressCity</tt></dt>    <dd>City of the cardholder. [max length: 50, min length: 2] </dd>
     *     <dt><tt>card.addressCountry</tt></dt>    <dd>Country code (ISO-3166-1-alpha-2 code) of residence of the cardholder. [max length: 2, min length: 2] </dd>
     *     <dt><tt>card.addressLine1</tt></dt>    <dd>Address of the cardholder. [max length: 255] </dd>
     *     <dt><tt>card.addressLine2</tt></dt>    <dd>Address of the cardholder if needed. [max length: 255] </dd>
     *     <dt><tt>card.addressState</tt></dt>    <dd>State of residence of the cardholder. State abbreviations should be used. [max length: 255] </dd>
     *     <dt><tt>card.addressZip</tt></dt>    <dd>Postal code of the cardholder. The postal code size is between 5 and 9 characters in length and only contains numbers or letters. [max length: 32] </dd>
     *     <dt><tt>card.cvc</tt></dt>    <dd>CVC security code of the card. This is the code on the back of the card. Example: 123 </dd>
     *     <dt><tt>card.expMonth</tt></dt>    <dd>Expiration month of the card. Format is MM. Example: January = 01 [min value: 1, max value: 12] </dd>
     *     <dt><tt>card.expYear</tt></dt>    <dd>Expiration year of the card. Format is YY. Example: 2013 = 13 [min value: 0, max value: 99] </dd>
     *     <dt><tt>card.name</tt></dt>    <dd>Name as it appears on the card. [max length: 50, min length: 2] </dd>
     *     <dt><tt>card.number</tt></dt>    <dd>Card number as it appears on the card. [max length: 19, min length: 13] </dd>
     *     <dt><tt>currency</tt></dt>    <dd>Currency code (ISO-4217) for the transaction to be checked for fraud. This field is required if using “full” or “advanced” mode. </dd>
     *     <dt><tt>description</tt></dt>    <dd>- Description of the fraud check. [max length: 255] </dd>
     *     <dt><tt>ipAddress</tt></dt>    <dd>IP Address of the customer for which the fraud check is to be done. [max length: 45] </dd>
     *     <dt><tt>mode</tt></dt>    <dd>Fraud check mode.  “simple” only does an AVS and CVC check; “advanced” does a complete fraud check, running the input against the set up rules. [valid values: simple, advanced, full, SIMPLE, ADVANCED, FULL] <strong>required </strong></dd>
     *     <dt><tt>sessionId</tt></dt>    <dd>Session ID used during data collection. [max length: 255] </dd>
     *     <dt><tt>token</tt></dt>    <dd>Card token representing card details for the card to be checked. [max length: 255] </dd></dl>
     * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.<i/>
     * @return    FraudCheck a FraudCheck object.
     */
    static public function createFraudCheck($hash, $authentication = null) {

        $args = func_get_args();
        $authentication = SimplifyPaymentsApi::buildAuthenticationObject($authentication, $args, 2);

        $instance = new Simplify_FraudCheck();
        $instance->setAll($hash);

        $object = SimplifyPaymentsApi::createObject($instance, $authentication);
        return $object;
    }



       /**
        * Retrieve Simplify_FraudCheck objects.
        * @param     array criteria a map of parameters; valid keys are:<dl style="padding-left:10px;">
        *     <dt><tt>filter</tt></dt>    <dd>Filters to apply to the list.  </dd>
        *     <dt><tt>max</tt></dt>    <dd>Allows up to a max of 50 list items to return. [min value: 0, max value: 50, default: 20]  </dd>
        *     <dt><tt>offset</tt></dt>    <dd>Used in paging of the list.  This is the start offset of the page. [min value: 0, default: 0]  </dd>
        *     <dt><tt>sorting</tt></dt>    <dd>Allows for ascending or descending sorting of the list.  The value maps properties to the sort direction (either <tt>asc</tt> for ascending or <tt>desc</tt> for descending).  Sortable properties are: <tt> amount</tt><tt> dateCreated</tt><tt> fraudResult</tt>.</dd></dl>
        * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.</i>
        * @return    ResourceList a ResourceList object that holds the list of FraudCheck objects and the total
        *            number of FraudCheck objects available for the given criteria.
        * @see       ResourceList
        */
        static public function listFraudCheck($criteria = null, $authentication = null) {

            $args = func_get_args();
            $authentication = SimplifyPaymentsApi::buildAuthenticationObject($authentication, $args, 2);

            $val = new Simplify_FraudCheck();
            $list = SimplifyPaymentsApi::listObject($val, $criteria, $authentication);

            return $list;
        }


        /**
         * Retrieve a Simplify_FraudCheck object from the API
         *
         * @param     string id  the id of the FraudCheck object to retrieve
         * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.</i>
         * @return    FraudCheck a FraudCheck object
         */
        static public function findFraudCheck($id, $authentication = null) {

            $args = func_get_args();
            $authentication = SimplifyPaymentsApi::buildAuthenticationObject($authentication, $args, 2);

            $val = new Simplify_FraudCheck();
            $val->id = $id;

            $obj = SimplifyPaymentsApi::findObject($val, $authentication);

            return $obj;
        }


        /**
         * Updates an Simplify_FraudCheck object.
         *
         * The properties that can be updated:
         * <dl style="padding-left:10px;">
         *     <dt><tt>integratorAuthCode</tt></dt>    <dd>Authorization code for the transaction. [max length: 255] </dd>
         *     <dt><tt>integratorAvsAddressResponse</tt></dt>    <dd>AVS address response. [max length: 255] </dd>
         *     <dt><tt>integratorAvsZipResponse</tt></dt>    <dd>AVS zip response. [max length: 255] </dd>
         *     <dt><tt>integratorCvcResponse</tt></dt>    <dd>CVC response. [max length: 255] </dd>
         *     <dt><tt>integratorDeclineReason</tt></dt>    <dd>Reason for the decline if applicable. [max length: 255] </dd>
         *     <dt><tt>integratorTransactionRef</tt></dt>    <dd>Reference id for the transaction. [max length: 255] <strong>required </strong></dd>
         *     <dt><tt>integratorTransactionStatus</tt></dt>    <dd>Status of the transaction, valid values are "APPROVED", "DECLINED", "SETTLED", "REFUNDED" or "VOIDED". </dd></dl>
         * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.</i>
         * @return    FraudCheck a FraudCheck object.
         */
        public function updateFraudCheck($authentication = null)  {

            $args = func_get_args();
            $authentication = SimplifyPaymentsApi::buildAuthenticationObject($authentication, $args, 1);

            $object = SimplifyPaymentsApi::updateObject($this, $authentication);
            return $object;
        }

    /**
     * @ignore
     */
    public function getClazz() {
        return "FraudCheck";
    }
}