<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }

    public static function getAllCategory()
    {
        $category = new Category();

        return $category;
    }

    public static function getHeaderCategory()
    {
        $categories = Category::all();
        ?>
        <li>
            <a href="javascript:void(0);">Danh mục</a>
            <ul class="dropdown border-0 shadow">
                <?php
                foreach ($categories as $category) {
                    ?>
                    <li>
                        <a href="<?php echo route('product-cat', $category->slug); ?>">
                            <?php echo $category->title; ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }

    public static function productCategoryList($option = 'all')
    {
        if ($option = 'all') {
            return Category::orderBy('id', 'DESC')->get();
        }
        return Category::has('products')->orderBy('id', 'DESC')->get();
    }

    public static function postTagList($option = 'all')
    {
        if ($option = 'all') {
            return PostTag::orderBy('id', 'desc')->get();
        }
        return PostTag::has('posts')->orderBy('id', 'desc')->get();
    }

    public static function postCategoryList($option = "all")
    {
        if ($option = 'all') {
            return PostCategory::orderBy('id', 'DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id', 'DESC')->get();
    }

    // Cart Count
    public static function cartCount($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == "")
                $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('quantity');
        } else {
            return 0;
        }
    }
    // relationship cart with product
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public static function getAllProductFromCart($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == "")
                $user_id = auth()->user()->id;
            return Cart::with('product')->where('user_id', $user_id)->where('order_id', null)->get();
        } else {
            return 0;
        }
    }

    // Total amount cart
    public static function totalCartPrice($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == "")
                $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id, $user_id)
    {
        $order = Order::find($id);
        dd($id);
        if ($order) {
            $shipping_price = (float) $order->shipping->price;
            $order_price = self::orderPrice($id, $user_id);
            return number_format((float) ($order_price + $shipping_price), 2, '.', '');
        } else {
            return 0;
        }
    }

    // Admin home
    public static function earningPerMonth()
    {
        $month_data = Order::where('status', 'delivered')->get();
        // return $month_data;
        $price = 0;
        foreach ($month_data as $data) {
            $price = $data->cart_info->sum('price');
        }
        return number_format((float) ($price), 2, '.', '');
    }

    public static function shipping()
    {
        return Shipping::orderBy('price', 'DESC')->get();
    }
}
?>
