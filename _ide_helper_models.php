<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\Classification
     *
     * @property int $id
     * @property string $name
     * @property int $state
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase_Detail[] $purchases_detail
     * @property-read int|null $purchases_detail_count
     * @method static \Illuminate\Database\Eloquent\Builder|Classification newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Classification newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Classification query()
     * @method static \Illuminate\Database\Eloquent\Builder|Classification whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Classification whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Classification whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Classification whereState($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Classification whereUpdatedAt($value)
     */
    class Classification extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Client
     *
     * @property int $id
     * @property string $name
     * @property string $ruc
     * @property int $state
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
     * @property-read int|null $order_count
     * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Client query()
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereRuc($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereState($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
     */
    class Client extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Order
     *
     * @property int $id
     * @property string $name
     * @property int $client_id
     * @property int $quantity
     * @property string $date_start
     * @property string $date_end
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Client $client
     * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Order query()
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateEnd($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereDateStart($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereQuantity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
     */
    class Order extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Product
     *
     * @property int $id
     * @property string $name
     * @property float $price
     * @property int $state
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Product query()
     * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Product whereState($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
     */
    class Product extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Purchase
     *
     * @property int $id
     * @property string $date
     * @property int $supplier_id
     * @property string $authorization
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase_Detail[] $purchases_detail
     * @property-read int|null $purchases_detail_count
     * @property-read \App\Models\Supplier $supplier
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereAuthorization($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereSupplierId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
     */
    class Purchase extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Purchase_Detail
     *
     * @property int $id
     * @property int $purchase_id
     * @property int $quantity
     * @property string $detail
     * @property int $classification_id
     * @property float $unit_value
     * @property float $total_value
     * @property int $tax_id
     * @property float $total
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Classification $classification
     * @property-read \App\Models\Purchase $purchase
     * @property-read \App\Models\Tax $tax
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail query()
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereClassificationId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereDetail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail wherePurchaseId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereQuantity($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereTaxId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereTotal($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereTotalValue($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereUnitValue($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Purchase_Detail whereUpdatedAt($value)
     */
    class Purchase_Detail extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Supplier
     *
     * @property int $id
     * @property string $name
     * @property string $ruc
     * @property int $state
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchase
     * @property-read int|null $purchase_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase_Detail[] $purchase_details
     * @property-read int|null $purchase_details_count
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereRuc($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereState($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
     */
    class Supplier extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Tax
     *
     * @property int $id
     * @property string $name
     * @property int $state
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase_Detail[] $purchases_detail
     * @property-read int|null $purchases_detail_count
     * @method static \Illuminate\Database\Eloquent\Builder|Tax newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Tax newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Tax query()
     * @method static \Illuminate\Database\Eloquent\Builder|Tax whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Tax whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Tax whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Tax whereState($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Tax whereUpdatedAt($value)
     */
    class Tax extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}

