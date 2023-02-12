<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the recentnewscomment of frontend components
 */

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class RctNewsReplyWidget extends Widget
{
	public $recentNewsComments;
	
	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
		$NewscommentString='';
		
		foreach ($this->recentNewsComments as $Newscomment)
		{
			$NewscommentString.='<div class="news">'.
					'<div class="title">'.
					'<p style="color:#777777;font-style:italic;">'.
					nl2br($Newscomment->content).'</p>'.
					'<p class="text"> <span class="glyphicon glyphicon-user" aria-hidden="ture">
							</span> '.Html::encode($Newscomment->user->username).'</p>'.
					
					'<p style="font-size:8pt;color:bule">
							《<a href="'.$Newscomment->post->url.'">'.Html::encode($Newscomment->post->title).'</a>》</p>'.
					'<hr></div></div>';
		}
		return  $NewscommentString;
	}
}