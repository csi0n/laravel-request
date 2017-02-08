<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 07/02/2017
 * Time: 5:18 PM
 */

namespace csi0n\Laravel\Request\Repositories;

class CLaravelRequestRepository
{
    protected $rule_global  = [];
    protected $rule_get     = [];
    protected $rule_post    = [];
    protected $rule_put     = [];
    protected $rule_patch   = [];
    protected $rule_delete  = [];
    protected $rule_options = [];
    protected $rule_custom  = [];
    protected $method;

    public function getCurrentRule()
    {
        $global  = $this->getRuleGlobal();
        $current = [];
        if (request()->has('c_rule_method')) {
            if (empty(request()->c_rule_method)) {
                throw new \Exception('Rule Method Can\'t be empty');
            }
            return array_merge($global, $this->getRuleCustom());
        } else {
            switch (strtoupper(request()->method())) {
                case 'GET':
                    $current = $this->getRuleGet();
                    break;
                case 'POST':
                    $current = $this->getRulePost();
                    break;
                case 'PUT':
                    $current = $this->getRulePut();
                    break;
                case 'PATCH':
                    $current = $this->getRulePatch();
                    break;
                case 'DELETE':
                    $current = $this->getRuleDelete();
                    break;
                case 'OPTIONS':
                    $current = $this->getRuleOptions();
                    break;
                default:
                    break;
            }
            return array_merge($global, $current);
        }
    }

    public function CUSTOM($method, $rule_custom = [])
    {
        $this->method      = $method;
        $this->rule_custom = $rule_custom;
    }

    public function getRuleCustom()
    {
        return $this->rule_custom;
    }

    /**
     * @return array
     */
    public function getRuleGlobal()
    {
        return $this->rule_global;
    }

    /**
     * @param array $rule_global
     */
    public function COMMON($rule_global = [])
    {
        $this->rule_global = $rule_global;
    }

    /**
     * @return array
     */
    public function getRuleGet()
    {
        return $this->rule_get;
    }

    /**
     * @param array $rule_get
     */
    public function GET($rule_get = [])
    {
        $this->rule_get = $rule_get;
    }

    /**
     * @return array
     */
    public function getRulePost()
    {
        return $this->rule_post;
    }

    /**
     * @param array $rule_post
     */
    public function POST($rule_post = [])
    {
        $this->rule_post = $rule_post;
    }

    /**
     * @return array
     */
    public function getRulePut()
    {
        return $this->rule_put;
    }

    /**
     * @param array $rule_put
     */
    public function PUT($rule_put = [])
    {
        $this->rule_put = $rule_put;
    }

    /**
     * @return array
     */
    public function getRulePatch()
    {
        return $this->rule_patch;
    }

    /**
     * @param array $rule_patch
     */
    public function PATCH($rule_patch = [])
    {
        $this->rule_patch = $rule_patch;
    }

    /**
     * @return array
     */
    public function getRuleDelete()
    {
        return $this->rule_delete;
    }

    /**
     * @param array $rule_delete
     */
    public function DELETE($rule_delete = [])
    {
        $this->rule_delete = $rule_delete;
    }

    /**
     * @return array
     */
    public function getRuleOptions()
    {
        return $this->rule_options;
    }

    /**
     * @param array $rule_options
     */
    public function OPTIONS($rule_options = [])
    {
        $this->rule_options = $rule_options;
    }
}
