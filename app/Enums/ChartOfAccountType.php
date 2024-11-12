<?php

namespace App\Enums;

enum ChartOfAccountType: string
{
    /**
     * Assets
     */
    case CASH_AND_CASH_EQUIVALENT = 'cash_and_cash_equivalent';
    case ACCOUNTS_RECEIVABLE = 'accounts_receivable';
    case INVENTORY = 'inventory';
    case PREPAID_EXPENSES = 'prepaid_expenses';
    case FIXED_ASSETS = 'fixed_assets';
    case INTANGIBLE_ASSETS = 'intangible_assets';
    case OTHER_ASSETS = 'other_assets';

    /**
     * Liabilities
     */
    case CURRENT_LIABILITIES = 'current_liabilities';
    case ACCOUNTS_PAYABLE = 'accounts_payable';
    case SHORT_TERM_DEBT = 'short_term_debt';
    case LONG_TERM_DEBT = 'long_term_debt';
    case ACCRUED_EXPENSES = 'accrued_expenses';
    case DEFERRED_REVENUE = 'deferred_revenue';
    case OTHER_LIABILITIES = 'other_liabilities';

    /**
     * Equity
     */
    case OWNER_EQUITY = 'owner_equity';
    case RETAINED_EARNINGS = 'retained_earnings';
    case COMMON_STOCK = 'common_stock';
    case ADDITIONAL_PAID_IN_CAPITAL = 'additional_paid_in_capital';
    case TREASURY_STOCK = 'treasury_stock';

    /**
     * Revenue
     */
    case SALES_REVENUE = 'sales_revenue';
    case SERVICE_REVENUE = 'service_revenue';
    case INTEREST_REVENUE = 'interest_revenue';
    case OTHER_REVENUE = 'other_revenue';

    /**
     * Expense
     */
    case COST_OF_GOODS_SOLD = 'cost_of_goods_sold';
    case OPERATING_EXPENSES = 'operating_expenses';
    case SELLING_GENERAL_AND_ADMIN = 'selling_general_and_admin';
    case DEPRECIATION = 'depreciation';
    case AMORTIZATION = 'amortization';
    case INTEREST_EXPENSE = 'interest_expense';
    case TAX_EXPENSE = 'tax_expense';
    case OTHER_EXPENSES = 'other_expenses';

    /**
     * Other Income/Expense
     */
    case OTHER_INCOME = 'other_income';
    case OTHER_EXPENSE = 'other_expense';

    /**
     * Get the human-readable label in Title Case
     *
     * @return string
     */
    public function getLabel(): string
    {
        return ucwords(str_replace('_', ' ', $this->value));
    }

    /**
     * Group Chart of Account Types by category.
     *
     * @return array
     */
    public static function groupByType(): array
    {
        return [
            'assets' => [
                self::CASH_AND_CASH_EQUIVALENT,
                self::ACCOUNTS_RECEIVABLE,
                self::INVENTORY,
                self::PREPAID_EXPENSES,
                self::FIXED_ASSETS,
                self::INTANGIBLE_ASSETS,
                self::OTHER_ASSETS,
            ],
            'liabilities' => [
                self::CURRENT_LIABILITIES,
                self::ACCOUNTS_PAYABLE,
                self::SHORT_TERM_DEBT,
                self::LONG_TERM_DEBT,
                self::ACCRUED_EXPENSES,
                self::DEFERRED_REVENUE,
                self::OTHER_LIABILITIES,
            ],
            'equity' => [
                self::OWNER_EQUITY,
                self::RETAINED_EARNINGS,
                self::COMMON_STOCK,
                self::ADDITIONAL_PAID_IN_CAPITAL,
                self::TREASURY_STOCK,
            ],
            'revenue' => [
                self::SALES_REVENUE,
                self::SERVICE_REVENUE,
                self::INTEREST_REVENUE,
                self::OTHER_REVENUE,
            ],
            'expenses' => [
                self::COST_OF_GOODS_SOLD,
                self::OPERATING_EXPENSES,
                self::SELLING_GENERAL_AND_ADMIN,
                self::DEPRECIATION,
                self::AMORTIZATION,
                self::INTEREST_EXPENSE,
                self::TAX_EXPENSE,
                self::OTHER_EXPENSES,
            ],
            'other' => [
                self::OTHER_INCOME,
                self::OTHER_EXPENSE,
            ]
        ];
    }
}
