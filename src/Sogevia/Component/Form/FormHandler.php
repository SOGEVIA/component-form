<?php

namespace Sogevia\Component\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Form handler application
 */
class FormHandler
{
    /**
     * @var array
     */
    protected $methods;

    /**
     * __construct
     *
     * @param array $methods Allowed methods
     */
    public function __construct(array $methods = [])
    {
        $this->methods = empty($methods) ? ['POST', 'PUT', 'PATCH'] : $methods;
    }

    /**
     * validate
     *
     * @param Form    $form    Form
     * @param Request $request Request
     *
     * @return boolean
     */
    public function validate(Form $form, Request $request)
    {
        if ($this->hasMethod($request->getMethod())) {
            if ($request->getMethod() != 'POST') {
                $form->submit($request);
            } else {
                $form->handleRequest($request);
            }

            return $form->isValid();
        }

        return false;
    }

    /**
     * processing validation
     * By default, validate form
     *
     * @param Form    $form    Form
     * @param Request $request Request
     *
     * @return mixed
     */
    public function process(Form $form, Request $request)
    {
        return $this->validate($form, $request);
    }

    /**
     * Retrieve all form errors, including child elements
     *
     * @param Form   $form
     *
     * @return array
     */
    public function getErrors(Form $form)
    {
        return $form->getErrors();
    }

    /**
     * addMethod
     *
     * @param string $method
     *
     * @return FormHandler
     */
    public function addMethod($method)
    {
        if (!$this->hasMethod($method)) {
            $this->methods[] = $method;
        }
    }

    /**
     * hasMethod
     *
     * @param string $method
     *
     * @return boolean
     */
    public function hasMethod($method)
    {
        return in_array($method, $this->methods);
    }

    /**
     * setMethods
     *
     * @param array $methods
     *
     * @return FormHandler
     */
    public function setMethods(array $methods)
    {
        $this->methods = $methods;

        return $this;
    }

    /**
     * getMethods
     *
     * @return array
     */
    public function getMethods()
    {
        return $this->methods;
    }

}
