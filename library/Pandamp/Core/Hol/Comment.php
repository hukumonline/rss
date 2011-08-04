<?php

/**
 * Description of Comment
 *
 * @author nihki <nihki@madaniyah.com>
 */
class Pandamp_Core_Hol_Comment
{
    public function save($aData)
    {
        $aResult = array();

        $parent = $aData['parent_id'];
        $objectId = $aData['guid'];
        $name = $aData['name'];
        $email = $aData['email'];
        $title = $aData['title'];
        $comment = $aData['comment'];

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity())
            $userId = $auth->getIdentity()->kopel;
        else
            $userId = 0;

        $modelComment = new App_Model_Db_Table_Comment();

        $catalogGuid = $modelComment->addComment(array(
            'parent'	=> $parent,
            'object_id'	=> $objectId,
            'userid'	=> $userId,
            'name'	=> $name,
            'email'	=> $email,
            'title'	=> $title,
            'comment'	=> $comment,
            'ip'	=> Pandamp_Lib_Formater::getRealIpAddr(),
            'date'	=> new Zend_Db_Expr('NOW()')
        ));

        return $catalogGuid;
    }

}
