<?php

namespace WLMStripe\Util;

class ObjectTypes {

	/**
	 * @var array Mapping from object types to resource classes
	 */
	const MAPPING = [
		\WLMStripe\Account::OBJECT_NAME => \WLMStripe\Account::class,
		\WLMStripe\AccountLink::OBJECT_NAME => \WLMStripe\AccountLink::class,
		\WLMStripe\AlipayAccount::OBJECT_NAME => \WLMStripe\AlipayAccount::class,
		\WLMStripe\ApplePayDomain::OBJECT_NAME => \WLMStripe\ApplePayDomain::class,
		\WLMStripe\ApplicationFee::OBJECT_NAME => \WLMStripe\ApplicationFee::class,
		\WLMStripe\ApplicationFeeRefund::OBJECT_NAME => \WLMStripe\ApplicationFeeRefund::class,
		\WLMStripe\Balance::OBJECT_NAME => \WLMStripe\Balance::class,
		\WLMStripe\BalanceTransaction::OBJECT_NAME => \WLMStripe\BalanceTransaction::class,
		\WLMStripe\BankAccount::OBJECT_NAME => \WLMStripe\BankAccount::class,
		\WLMStripe\BillingPortal\Session::OBJECT_NAME => \WLMStripe\BillingPortal\Session::class,
		\WLMStripe\BitcoinReceiver::OBJECT_NAME => \WLMStripe\BitcoinReceiver::class,
		\WLMStripe\BitcoinTransaction::OBJECT_NAME => \WLMStripe\BitcoinTransaction::class,
		\WLMStripe\Capability::OBJECT_NAME => \WLMStripe\Capability::class,
		\WLMStripe\Card::OBJECT_NAME => \WLMStripe\Card::class,
		\WLMStripe\Charge::OBJECT_NAME => \WLMStripe\Charge::class,
		\WLMStripe\Checkout\Session::OBJECT_NAME => \WLMStripe\Checkout\Session::class,
		\WLMStripe\Collection::OBJECT_NAME => \WLMStripe\Collection::class,
		\WLMStripe\CountrySpec::OBJECT_NAME => \WLMStripe\CountrySpec::class,
		\WLMStripe\Coupon::OBJECT_NAME => \WLMStripe\Coupon::class,
		\WLMStripe\CreditNote::OBJECT_NAME => \WLMStripe\CreditNote::class,
		\WLMStripe\CreditNoteLineItem::OBJECT_NAME => \WLMStripe\CreditNoteLineItem::class,
		\WLMStripe\Customer::OBJECT_NAME => \WLMStripe\Customer::class,
		\WLMStripe\CustomerBalanceTransaction::OBJECT_NAME => \WLMStripe\CustomerBalanceTransaction::class,
		\WLMStripe\Discount::OBJECT_NAME => \WLMStripe\Discount::class,
		\WLMStripe\Dispute::OBJECT_NAME => \WLMStripe\Dispute::class,
		\WLMStripe\EphemeralKey::OBJECT_NAME => \WLMStripe\EphemeralKey::class,
		\WLMStripe\Event::OBJECT_NAME => \WLMStripe\Event::class,
		\WLMStripe\ExchangeRate::OBJECT_NAME => \WLMStripe\ExchangeRate::class,
		\WLMStripe\File::OBJECT_NAME => \WLMStripe\File::class,
		\WLMStripe\File::OBJECT_NAME_ALT => \WLMStripe\File::class,
		\WLMStripe\FileLink::OBJECT_NAME => \WLMStripe\FileLink::class,
		\WLMStripe\Invoice::OBJECT_NAME => \WLMStripe\Invoice::class,
		\WLMStripe\InvoiceItem::OBJECT_NAME => \WLMStripe\InvoiceItem::class,
		\WLMStripe\InvoiceLineItem::OBJECT_NAME => \WLMStripe\InvoiceLineItem::class,
		\WLMStripe\Issuing\Authorization::OBJECT_NAME => \WLMStripe\Issuing\Authorization::class,
		\WLMStripe\Issuing\Card::OBJECT_NAME => \WLMStripe\Issuing\Card::class,
		\WLMStripe\Issuing\CardDetails::OBJECT_NAME => \WLMStripe\Issuing\CardDetails::class,
		\WLMStripe\Issuing\Cardholder::OBJECT_NAME => \WLMStripe\Issuing\Cardholder::class,
		\WLMStripe\Issuing\Dispute::OBJECT_NAME => \WLMStripe\Issuing\Dispute::class,
		\WLMStripe\Issuing\Transaction::OBJECT_NAME => \WLMStripe\Issuing\Transaction::class,
		\WLMStripe\LineItem::OBJECT_NAME => \WLMStripe\LineItem::class,
		\WLMStripe\LoginLink::OBJECT_NAME => \WLMStripe\LoginLink::class,
		\WLMStripe\Mandate::OBJECT_NAME => \WLMStripe\Mandate::class,
		\WLMStripe\Order::OBJECT_NAME => \WLMStripe\Order::class,
		\WLMStripe\OrderItem::OBJECT_NAME => \WLMStripe\OrderItem::class,
		\WLMStripe\OrderReturn::OBJECT_NAME => \WLMStripe\OrderReturn::class,
		\WLMStripe\PaymentIntent::OBJECT_NAME => \WLMStripe\PaymentIntent::class,
		\WLMStripe\PaymentMethod::OBJECT_NAME => \WLMStripe\PaymentMethod::class,
		\WLMStripe\Payout::OBJECT_NAME => \WLMStripe\Payout::class,
		\WLMStripe\Person::OBJECT_NAME => \WLMStripe\Person::class,
		\WLMStripe\Plan::OBJECT_NAME => \WLMStripe\Plan::class,
		\WLMStripe\Price::OBJECT_NAME => \WLMStripe\Price::class,
		\WLMStripe\Product::OBJECT_NAME => \WLMStripe\Product::class,
		\WLMStripe\Radar\EarlyFraudWarning::OBJECT_NAME => \WLMStripe\Radar\EarlyFraudWarning::class,
		\WLMStripe\Radar\ValueList::OBJECT_NAME => \WLMStripe\Radar\ValueList::class,
		\WLMStripe\Radar\ValueListItem::OBJECT_NAME => \WLMStripe\Radar\ValueListItem::class,
		\WLMStripe\Recipient::OBJECT_NAME => \WLMStripe\Recipient::class,
		\WLMStripe\RecipientTransfer::OBJECT_NAME => \WLMStripe\RecipientTransfer::class,
		\WLMStripe\Refund::OBJECT_NAME => \WLMStripe\Refund::class,
		\WLMStripe\Reporting\ReportRun::OBJECT_NAME => \WLMStripe\Reporting\ReportRun::class,
		\WLMStripe\Reporting\ReportType::OBJECT_NAME => \WLMStripe\Reporting\ReportType::class,
		\WLMStripe\Review::OBJECT_NAME => \WLMStripe\Review::class,
		\WLMStripe\SetupIntent::OBJECT_NAME => \WLMStripe\SetupIntent::class,
		\WLMStripe\Sigma\ScheduledQueryRun::OBJECT_NAME => \WLMStripe\Sigma\ScheduledQueryRun::class,
		\WLMStripe\SKU::OBJECT_NAME => \WLMStripe\SKU::class,
		\WLMStripe\Source::OBJECT_NAME => \WLMStripe\Source::class,
		\WLMStripe\SourceTransaction::OBJECT_NAME => \WLMStripe\SourceTransaction::class,
		\WLMStripe\Subscription::OBJECT_NAME => \WLMStripe\Subscription::class,
		\WLMStripe\SubscriptionItem::OBJECT_NAME => \WLMStripe\SubscriptionItem::class,
		\WLMStripe\SubscriptionSchedule::OBJECT_NAME => \WLMStripe\SubscriptionSchedule::class,
		\WLMStripe\TaxId::OBJECT_NAME => \WLMStripe\TaxId::class,
		\WLMStripe\TaxRate::OBJECT_NAME => \WLMStripe\TaxRate::class,
		\WLMStripe\Terminal\ConnectionToken::OBJECT_NAME => \WLMStripe\Terminal\ConnectionToken::class,
		\WLMStripe\Terminal\Location::OBJECT_NAME => \WLMStripe\Terminal\Location::class,
		\WLMStripe\Terminal\Reader::OBJECT_NAME => \WLMStripe\Terminal\Reader::class,
		\WLMStripe\ThreeDSecure::OBJECT_NAME => \WLMStripe\ThreeDSecure::class,
		\WLMStripe\Token::OBJECT_NAME => \WLMStripe\Token::class,
		\WLMStripe\Topup::OBJECT_NAME => \WLMStripe\Topup::class,
		\WLMStripe\Transfer::OBJECT_NAME => \WLMStripe\Transfer::class,
		\WLMStripe\TransferReversal::OBJECT_NAME => \WLMStripe\TransferReversal::class,
		\WLMStripe\UsageRecord::OBJECT_NAME => \WLMStripe\UsageRecord::class,
		\WLMStripe\UsageRecordSummary::OBJECT_NAME => \WLMStripe\UsageRecordSummary::class,
		\WLMStripe\WebhookEndpoint::OBJECT_NAME => \WLMStripe\WebhookEndpoint::class,
	];
}
