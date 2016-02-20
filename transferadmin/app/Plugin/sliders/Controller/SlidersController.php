<?php
/**
 * Short description for file.
 * This file is application controller file. 
 * Application controller-related methods and Members here.
 * @filesource
 * @copyright		Copyright 20011-2012, Synapse Communication.
 * @package			app
 * @subpackage		app.controllers
 * @author 			$Creator: EMP-1040
 * @modifiedby		$LastChangedBy: EMP-1040
 * @lastmodified	$Date: 21 Aug 2012
 */
/**
 * This is a Members controller class.
 * Create the same file in app/plugin/sliders/controllers/SlidersController.php
 * @package		app
 * @subpackage	app.controllers
 */
 
 
class SlidersController extends AppController {

	public $helpers = array('Text');
	public $components = array('File');
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
	* A view action.
	*
	* @return mixed a rendered view of action related view(app/plugin/sliders/views/sliders/index.ctp)
	* @access public
	*/	
	function index() {
	}


	/**
	* A view action.
	*
	* @return mixed a rendered view of action related view(app/plugin/sliders/views/sliders/admin_index.ctp)
	* @access public
	*/	
	function admin_index() {
		
		$this->checkLogin();
					
		// setting page title for each page
		$this->pageTitle = 'Manage Sliders';
		
		if(!empty($this->data)){
			// check for status change
			if(isset($this->data['Slider']['submit']) && trim($this->data['Slider']['submit']) == 'Submit'){
				if(isset($this->data['Slider']['id']) && count($this->data['Slider']['id']) > 0){
					$this->update_status(trim($this->data['Slider']['status']), $this->data['Slider']['id'], count($this->data['Slider']['id']));
				} else {
					$this->Session->setFlash('Please select any checkbox to perform any action.', 'flash', array('class' => 'alert-info'));
				}
			}
		}
	
		$conditions[] = array();
		$this->paginate = array('limit' => '10', 'order' => array('Slider.created' => 'DESC'));
		$sliders = $this->paginate('Slider', $conditions); //default take the current
		$this->set('sliders', $sliders);
	
		$this->set('mode', array('activate'=>'Activate' ,'deactivate'=>'Deactivate' , 'delete'=>'Delete'));
		$this->set('limit', $this->params['request']['paging']['Slider']['options']['limit']);
		$this->set('page', $this->params['request']['paging']['Slider']['options']['page']);
	}
	
	
	
	
	/**
	* function to update Members status
	* @param $mode:string
	* @param $ids:array
	* @param $count:integer
	* @return boolean
	**/
	function update_status($status, $ids, $count){
	
		switch(trim($status)){
			case "activate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Slider->id = $ids[$ctr];
					$this->Slider->saveField("status", 'active');
				}
				$this->Session->setFlash('Slider(s) has been activated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "deactivate":
				for($ctr=0;$ctr<$count;$ctr++){
					$this->Slider->id = $ids[$ctr];
					$this->Slider->saveField("status", 'deactive');
				}
				$this->Session->setFlash('Slider(s) has been deactivated successfully.', 'flash', array('class' => 'alert-success'));
				break;
			case "delete":
				for($i=0;$i<$count;$i++){
					
					// getting original data
					$data = array();
					$this->Slider->id = $ids[$i];
					$data = $this->Slider->read();
					$this->Slider->delete($ids[$i]);
				}
				$this->Session->setFlash('Slider(s) has been deleted successfully.', 'flash', array('class' => 'alert-success'));
				break;
		}
	}
	
	
	/**
	* A view action.
	*
	* @return mixed a rendered view of action related view(app/plugin/sliders/views/sliders/admin_add.ctp)
	* @access public
	*/		
	function admin_add() {
	
		$this->checkLogin();
		// setting page title for each page
		$this->pageTitle = 'Add New Slider';
		
		if(!empty($this->data)) {
			//pr($this->data);
			// upload file
			$ori_file_name = $this->data['Slider']['image_name']['name'];
			$file_name = date('Ymdhis').$this->data['Slider']['image_name']['name'];
			$file = $this->File->uploadAllExtention($this->data['Slider']['image_name'], FILES_FOLDER.'slides/', 304857600, $file_name);
			//pr($file);
			if(is_array($file)) {
				$file_name = trim($file['file_name']);
				$this->request->data['Slider']['image_name'] = $file_name;
			}
			$this->request->data['Slider']['saved_image_name']=$ori_file_name;
			//pr($this->data); exit;
			if($this->Slider->create($this->data) && $this->Slider->validates()) {
				if($this->Slider->save($this->data)) {
					$this->Session->setFlash('Slider has been uploaded successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/sliders/sliders/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-error'));
					$this->redirect('/admin/sliders/sliders/');
				}
			} else {
				// debug("Some error occured while validating the data");
			}
		}
	}
	
	
	
	/**
	* A view action.
	*
	* @return mixed a rendered view of action related view(app/plugin/sliders/views/sliders/admin_edit.ctp)
	* @access public
	*/
	function admin_edit($id = null) {
	
		$this->checkLogin();
		// setting page title for each page
		$this->pageTitle = 'Edit Sliders';
		
		
		if(!empty($this->data) && is_numeric($this->data['Slider']['id'])) {
			$id = $this->Slider->id = $this->data['Slider']['id'];
			if($this->Slider->create($this->data) && $this->Slider->validates()) {
				$data = $this->data;
				// upload file
				
				$temp_data = $this->Slider->findById($id);
				$data['Slider']['image_name'] = $temp_data['Slider']['image_name'];
				
				if(!empty($this->data['Slider']['image_name']['name'])) {
					$ori_file_name = $this->data['Slider']['image_name']['name'];
					$file_name = date('Ymdhis').$this->data['Slider']['image_name']['name'];
					$file = $this->File->uploadAllExtention($this->data['Slider']['image_name'], FILES_FOLDER.'slides/', 304857600, $file_name);
					if(is_array($file)) {
						$file_name = trim($file['file_name']);
						$data['Slider']['image_name'] = $file_name;
					}
					$data['Slider']['saved_image_name']=$ori_file_name;
				}
				
				
				
				if($this->Slider->save($data)) {
				//die("testing");
					$this->Session->setFlash('Sliders information has been updated successfully.', 'flash', array('class' => 'alert-success'));
					$this->redirect('/admin/sliders/sliders/');
				} else {
					$this->Session->setFlash('Some error has been occured. Please try again.', 'flash', array('class' => 'alert-error'));
					$this->redirect('/admin/sliders/sliders/');
				}
			} else {
				$this->Slider->invalidFields();
			}
		}else{
			if(is_numeric($id) && $id > 0) {
				$data = $this->Slider->findById($id);
				$this->request->data = $data;
			} else {
				$this->Session->setFlash('Invalid Sliders id.');
				$this->redirect('/admin/sliders/sliders/');
			}
		}
		
		$this->set('pid', $id);
	}
	
}
?>
