<?php
/**
 * CRUD Core Controller
 */

namespace App\Http\Controllers;

use App\Repositories\CrudRepository;
use Illuminate\Http\Request;

/**
 * Class CrudController
 * @package App\Http\Controllers
 */
abstract class CrudController extends Controller
{
    const CREATE_RULES = [];
    const UPDATE_RULES = [];
    const FIELDS = [];
    const OBJECTNAME = "";
    const ID = "id";

    /**
     * Repository Instance
     *
     * @var
     */
    protected $repository;

    /**
     * CrudController constructor.
     * @param CrudRepository $repository
     */
    public function __construct(CrudRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List of items
     *
     * @param int $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($page = 1)
    {
        $getList = $this->repository->getList($page);

        if($getList->status == 200)
        {
            return response()->json([
                "list" => $getList->list,
                "max_page" => $getList->max_page,
                "prev_page" => $getList->prev_page,
                "next_page" => $getList->next_page,
                "message" => $getList->message,
            ]);
        }

        return response()->json([
            "list" => null,
            "max_page" => null,
            "prev_page" => null,
            "next_page" => null,
            "message" => $getList->message,
        ], $getList->status);
    }

    /**
     * Create new item
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, $this->createRules(static::CREATE_RULES));
        $create = $this->repository->create($this->getFields($request));

        return response()->json([
            "message" => $create->message,
            static::OBJECTNAME => $create->model,
        ]);
    }

    /**
     * Update item
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $model = $this->find($id);

        $this->validate($request, $this->updateRules($id,static::UPDATE_RULES));

        $update = $this->repository->update($model, $this->getFields($request));

        return response()->json([
            "message" => $update->message,
            static::OBJECTNAME => $update->model,
        ]);
    }

    /**
     * Get item
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id)
    {
        $model = $this->find($id);

        $model = $this->repository->view($model);
        return response()->json($model);
    }

    /**
     * Delete item
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public  function delete($id)
    {
        $model = $this->find($id);
        $delete = $this->repository->delete($model);

        if($delete->status == 200) {
            return response()->json([
                "message" => $delete->message
            ]);
        }

        return response()->json([
            "message" => $delete->message
        ], $delete->status);
    }

    /**
     * Find model or return 404
     *
     * @param $id
     */
    protected function find($id)
    {
        return $this->repository->find(static::ID, $id) ??  abort('404');
    }

    /**
     * Get the Parameter Fields
     *
     * @param Request $request
     * @return array
     */
    protected function getFields(Request $request)
    {
        return $request->only(static::FIELDS);
    }

    /**
     * Get the Update Rules
     *
     * @param $id
     * @param $rules
     * @return mixed
     */
    protected function updateRules($id, $rules)
    {
        foreach($rules as $key => $rule)
        {
            $rules[$key] = str_replace('{id}',$id, $rule);
        }

        return $rules;
    }

    /**
     * Get the Create Rules
     *
     * @param $rules
     * @return mixed
     */
    protected  function createRules($rules)
    {
        return $rules;
    }
}