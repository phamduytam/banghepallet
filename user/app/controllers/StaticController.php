<?php

class StaticController extends Controller
{
	public function actionIndex()
	{
		$model = new StaticAR();
		$alias = $_SERVER['REQUEST_URI'];
		$search = array('/', '.html');
		$replace = array('', '');
		$alias = str_replace($search, $replace, $alias);
		$tintuc = $model->findByAttributes(array('alias' => $alias));
		if(!$tintuc)
			return ;

		$this->breadcrumbs = array(
			$tintuc->name => ''
			);
		$this->pageTitle = $tintuc->name;
		if ($tintuc->keyword != '')
			$this->keyword = $tintuc->keyword;
		if ($tintuc->description != '')
			$this->description = $tintuc->description;	
		$this->render('index', compact('tintuc'));
	}

	public function actionAdd()
	{
		$model = new StaticAR();
		if (app()->request->getPost('StaticAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('StaticAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());

			if($model->validate())
			{
				if($model->save()){
					user()->setFlash('messages', 'Add successful!!');
				}
			}
		}
		$this->render('add', compact('model'));
	}

	public function actionEdit($id)
	{
		$static = new StaticAR();
		$model = $static->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('StaticAR'))
		{
			$data = request()->getPost('StaticAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			if($model->validate())
			{
				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$this->render('edit', compact('model'));
	}
	public function actionDelete($id)
	{
		$model = StaticAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}