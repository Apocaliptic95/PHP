<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jezyk Controller
 *
 * @property \App\Model\Table\JezykTable $Jezyk
 */
class JezykController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $jezyk = $this->paginate($this->Jezyk);

        $this->set(compact('jezyk'));
        $this->set('_serialize', ['jezyk']);
    }

    /**
     * View method
     *
     * @param string|null $id Jezyk id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $jezyk = $this->Jezyk->get($id, [
            'contain' => ['Slowo']
        ]);

        $this->set('jezyk', $jezyk);
        $this->set('_serialize', ['jezyk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $jezyk = $this->Jezyk->newEntity();
        if ($this->request->is('post')) {
            $jezyk = $this->Jezyk->patchEntity($jezyk, $this->request->data);
            if ($this->Jezyk->save($jezyk)) {
                $this->Flash->success(__('Język został zapisany.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Język nie mógł zostać zapisany.'));
            }
        }
        $this->set(compact('jezyk'));
        $this->set('_serialize', ['jezyk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jezyk id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $jezyk = $this->Jezyk->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jezyk = $this->Jezyk->patchEntity($jezyk, $this->request->data);
            if ($this->Jezyk->save($jezyk)) {
                $this->Flash->success(__('Język został zapisany.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Język nie mógł zostać zapisany.'));
            }
        }
        $this->set(compact('jezyk'));
        $this->set('_serialize', ['jezyk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jezyk id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $this->request->allowMethod(['post', 'delete']);
        $jezyk = $this->Jezyk->get($id);
        if ($this->Jezyk->delete($jezyk)) {
            $this->Flash->success(__('Język został usunięty.'));
        } else {
            $this->Flash->error(__('ęzyk nie mógł zostać usunięty.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
