<?php
namespace Topxia\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleCategoryController extends BaseController
{
    public function embedAction($layout)
    {
        $categories = $this->getCategoryService()->getCategoryTree();
        return $this->render('TopxiaAdminBundle:Article_Category:embed.html.twig', array(
            'categories' => $categories,
            'layout' => $layout
        ));
    }

    public function createAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            $category = $this->getCategoryService()->createCategory($request->request->all());
            return $this->renderTbody();
        }
        // echo "string";exit();
        $category = array(
            'id' => 0,
            'name' => '',
            'code' => '',
            'pagesize' => '10',
            // 'groupId' => (int) $request->query->get('groupId'),
            'parentId' => (int) $request->query->get('parentId', 0),
            'weight' => 0,
            'publishArticle' => 1,
            'seoTitle' => '',
            'seoKeyword' => '',
            'seoDesc' => '',
            'published' => 1
        );

        $categoryTree = $this->getCategoryService()->getCategoryTree();
        return $this->render('TopxiaAdminBundle:Article_Category:modal.html.twig', array(
            'category' => $category,
            'categoryTree'  => $categoryTree
        ));
    }

    public function editAction(Request $request, $id)
    {
        $category = $this->getCategoryService()->getCategory($id);
        if (empty($category)) {
            throw $this->createNotFoundException();
        }

        if ($request->getMethod() == 'POST') {
            $category = $this->getCategoryService()->updateCategory($id, $request->request->all());
            return $this->renderTbody();
        }
        $categoryTree = $this->getCategoryService()->getCategoryTree();
        return $this->render('TopxiaAdminBundle:Article_Category:modal.html.twig', array(
            'category' => $category,
            'categoryTree'  => $categoryTree
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $category = $this->getCategoryService()->getCategory($id);
        if (empty($category)) {
            throw $this->createNotFoundException();
        }

        $childrenCnt = $this->getCategoryService()->findCategoriesCountByParentId($id);
        
        if($childrenCnt>0){
            throw $this->createNotFoundException("can't delete catagory when it has child catagory");
        }
        
        $condition=array('parentId' => $id) ;
        $articleCnt=$this->getArticleService()->searchArticleCount($condition);
        if($articleCnt>0){
            throw $this->createNotFoundException("can't delete catagory when it has articles");
        }
        $this->getCategoryService()->deleteCategory($id);

        return $this->renderTbody();
    }

    public function checkCodeAction(Request $request)
    {
        $code = $request->query->get('value');

        $exclude = $request->query->get('exclude');

        $avaliable = $this->getCategoryService()->isCategoryCodeAvaliable($code, $exclude);

        if ($avaliable) {
            $response = array('success' => true, 'message' => '');
        } else {
            $response = array('success' => false, 'message' => '编码已被占用，请换一个。');
        }

        return $this->createJsonResponse($response);
    }

    private function renderTbody()
    {
        $categories = $this->getCategoryService()->getCategoryTree();
        return $this->render('TopxiaAdminBundle:Article_Category:tbody.html.twig', array(
            'categories' => $categories,
            'categoryTree'  => $categories
        ));
    }

    private function getCategoryService()
    {
        return $this->getServiceKernel()->createService('Article.CategoryService');
    }

    private function getArticleService()
    {
        return $this->getServiceKernel()->createService('Article.ArticleService');
    }
}