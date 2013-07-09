<?php

/**
 * Module de localistion des magasins physique
 * 
 * @author Gabriel Janez gabriel_janez@hotmail.com
 * @category Store locator
 * @version 0.1
 */


class Gabi77_Storelocator_Block_Adminhtml_Type_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
   public function __construct()
   {
        parent::__construct();
        $this->_objectId = 'id';
        //vous remarquerez qu’on lui assigne le même blockGroup que le Grid Container
        $this->_blockGroup = 'storelocator';
        //et le meme controlleur
        $this->_controller = 'adminhtml_type';
        //on definit les labels pour les boutons save et les boutons delete
        $this->_updateButton('save', 'label','Sauvegarder');
        $this->_updateButton('delete', 'label', 'Supprimer');
    }
       /* Ici,  on regarde si on a transmit un objet au formulaire,
            afin de mettre le bon texte dans le  header (Editer ou
             Ajouter) */
    public function getHeaderText()
    {
        if( Mage::registry('type_data')&&Mage::registry('type_data')->getId())
         {
              return 'Modifier '.$this->htmlEscape(
              Mage::registry('type_data')->getTitle()).'<br />';
         }
         else
         {
             return 'Ajouter un type';
         }
    }
}