<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Shipping;
use App\Models\Tag;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HandleJsonResponses, HandleComponentError, WithPaginationLimit;

    const INSTANCE_DATA_TABLE = [
        'permission' => [
            'database' => 'App\DataTables\User\PermissionDataTable',
            'role_create' => Permission::CREATE,
        ],
        'role' => [
            'database' => 'App\DataTables\User\RoleDataTable',
            'role_create' => Role::CREATE,
        ],
        'delivery' => [
            'database' => 'App\DataTables\DeliveryDataTable',
            'role_create' => Delivery::CREATE,
        ],
        'shipping' => [
            'database' => 'App\DataTables\ShippingDataTable',
            'role_create' => Shipping::CREATE,
        ],
        'order' => [
            'database' => 'App\DataTables\OrderDataTable',
            'role_create' => Order::CREATE,
        ],
        'order_detail' => [
            'database' => 'App\DataTablesOrderDetailDataTable',
            'role_create' => OrderDetail::CREATE,
        ],
        'post' => [
            'database' => 'App\DataTables\PostDataTable',
            'role_create' => Post::CREATE,
        ],
        'product_category' => [
            'database' => 'App\DataTables\ProductCategoryDataTable',
            'role_create' => ProductCategory::CREATE,
        ],
        'product' => [
            'database' => 'App\DataTables\ProductDataTable',
            'role_create' => Product::CREATE,
        ],
        'customer' => [
            'database' => 'App\DataTables\CustomerDataTable',
            'role_create' => Customer::CREATE,
        ],
        'member' => [
            'database' => 'App\DataTables\MemberDataTable',
            'role_create' => Member::CREATE,
        ],
        'comment' => [
            'database' => 'App\DataTables\CommentDataTable',
            'role_create' => Comment::CREATE,
        ],
        'tag' => [
            'database' => 'App\DataTables\TagDataTable',
            'role_create' => Tag::CREATE,
        ],
    ];

    /**
     * @param $request
     * @return array
     */
    protected function buildInstance($request): array
    {
        return [
            self::INSTANCE_DATA_TABLE [$request->route()->getName()]['datatable'],
            __('generate.' . $request->route()->getName() . '.filter'),
            __('generate.' . $request->route()->getName() . '.editor'),
            __('generate.' . $request->route()->getName() . '.modal_size'),
            Gate::allows(self::INSTANCE_DATA_TABLE [$request->route()->getName()]['role_create'])
        ];
    }

    /**
     * @param $data
     * @param string $message
     * @return array
     */
    public function success($data = null, string $message = ''): array
    {
        return (['status' => 'success', 'data' => $data, 'message' => $message]);
    }

    /**
     * @param string $message
     * @return array
     */
    public function error(string $message = ''): array
    {
        $message = empty($message) ? $message = __('string.error_response_default') : $message;
        return (['status' => 'error', 'message' => $message]);
    }

    /**
     * @return string[]
     */
    public function unauth(): array
    {
        return (['status' => 'unauth']);
    }
}
