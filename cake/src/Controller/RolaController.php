<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rola Controller
 *
 * @property \App\Model\Table\RolaTable $Rola
 */
class RolaController extends AppController
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
        $rola = $this->paginate($this->Rola);

        $this->set(compact('rola'));
        $this->set('_serialize', ['rola']);
    }

    /**
     * View method
     *
     * @param string|null $id Rola id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $rola = $this->Rola->get($id, [
            'contain' => ['Konto']
        ]);

        $this->set('rola', $rola);
        $this->set('_serialize', ['rola']);
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
        $rola = $this->Rola->newEntity();
        if ($this->request->is('post')) {
            $rola = $this->Rola->patchEntity($rola, $this->request->data);
            if ($this->Rola->save($rola)) {
                $this->Flash->success(__('Rola została zapisana.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Rola nie została zapisana.'));
            }
        }
        $this->set(compact('rola'));
        $this->set('_serialize', ['rola']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rola id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $rola = $this->Rola->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rola = $this->Rola->patchEntity($rola, $this->request->data);
            if ($this->Rola->save($rola)) {
                $this->Flash->success(__('Rola została zapisana.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Rola nie została zapisana.'));
            }
        }
        $this->set(compact('rola'));
        $this->set('_serialize', ['rola']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rola id.
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
        $rola = $this->Rola->get($id);
        if ($this->Rola->delete($rola)) {
            $this->Flash->success(__('Rola została usunięta.'));
        } else {
            $this->Flash->error(__('Rola nie została usunięta.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
