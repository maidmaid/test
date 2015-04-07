Hi !

I find that the CRUD generator is a really cool tool. It provides a good working base. But I think it could provide an **excellent** working base !

Indeed I always lose some time to adapt generated code, mainly because the basic templates will not follow all the best practices. Here are some comments : 

1)

> [So it's much simpler to let newAction handle everything.](http://symfony.com/doc/current/best_practices/forms.html#handling-form-submits)

While with current generator :

```php
public function createAction(Request $request) {}
public function newAction() {}
```

2)

> [Add buttons in the templates, not in the form classes or the controllers.](http://symfony.com/doc/current/best_practices/forms.html#form-button-configuration)

While with current generator :

```php
$form->add('submit', 'submit', array('label' => 'Create'));
```

3)

> [Store all your application's templates in app/Resources/views/ directory](http://symfony.com/doc/current/best_practices/templates.html#template-locations)

While with current generator, templates is stored in AppBundle/Resources/views/

4)

> [Rendering the Form](http://symfony.com/doc/current/best_practices/forms.html#rendering-the-form)

```twig
{{ form_start(form, {'attr': {'class': 'my-form-class'} }) }}
    {{ form_widget(form) }}
{{ form_end(form) }}
```

While with current generator :

```twig
{{ form(edit_form) }}
```

5)

> [Don't use the @Template() annotation to configure the template used by the controller.](http://symfony.com/doc/current/best_practices/controllers.html#template-configuration)

While with current generator :

```php
/**
  * Lists all Category entities.
  *
  * @Route("/", name="category")
  * @Method("GET")
  * @Template()
  */
 public function indexAction() {}
```

6)

> [Second, we recommend using $form->isSubmitted() in the if statement for clarity. ](http://symfony.com/doc/current/best_practices/forms.html#handling-form-submits)

While with current generator :

```php
if ($form->isValid()) {}
```

7) 

Names variables are very generic, it use ``$entity`` and ``$entities`` :

```php
$entity = new Category(); // in newAction
$entities = $em->getRepository('AppBundle:Category')->findAll(); // in indexAction
```

It would be better with a more contextuel name :

```php
$category = new Category(); // in newAction
$categories = $em->getRepository('AppBundle:Category')->findAll(); // in indexAction
```

I think for it, an plurialized filter twig would be needed as exception for categor**y** -> categor**ies**.

8)

> [Use the ParamConverter trick to automatically query for Doctrine entities when it's simple and convenient](http://symfony.com/doc/current/best_practices/controllers.html#using-the-paramconverter)

While with current generator :

```php
public function showAction($id)
{
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('AppBundle:Category')->find($id);
    //...
}
```

9)

Current generator doesn't use ``redirectToRoute()`` shortcut notation for routage :

```php
return $this->redirect($this->generateUrl('category'));
```

10)

Current generator doesn't use ``requirements`` in routes definitions :

```php
/**
 * Finds and displays a Category entity.
 *
 * @Route("/{id}", name="category_show")
 * @Method({"GET", "POST"})
 */
public function showAction($id) {}
```

In this case, add ``requirements={"id" = "\d+"}`` would be better.

11)

> [Use lowercased snake_case for directory and template names.](http://symfony.com/doc/current/best_practices/templates.html#template-locations)

While with current generator : ``AppBundle:Category:index.html.twig``

12)

> [Add the app_ prefix to your custom form field types to avoid collisions.](http://symfony.com/doc/current/best_practices/forms.html#custom-form-field-types)

While with current generator : ``appbundle_category``

