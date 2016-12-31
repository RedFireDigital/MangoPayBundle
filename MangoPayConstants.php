<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    31/12/16
 * Time:    00:53
 * Project: fruitful-property-investments
 * File:    MangoPayConstants.php
 *
 **/

namespace PartFire\MangoPayBundle;


class MangoPayConstants
{
    // https://docs.mangopay.com/endpoints/v2/users#e254_the-natural-user-object

    public static function getIncomeRangeFromId(int $id) : string
    {
        switch ($id) {
            case 1:
                $range = "incomes <18K€";
                break;
            case 2:
                $range = "incomes between 18 and 30K€";
                break;
            case 3:
                $range = "incomes between 30 and 50K€";
                break;
            case 4:
                $range = "incomes between 50 and 80K€";
                break;
            case 5:
                $range = "incomes between 80 and 120K€";
                break;
            case 6:
                $range = "incomes>120K€";
                break;
            default:
                $range = "Unknown range";
        }

        return $range;
    }
}