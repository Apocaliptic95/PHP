<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kategoria Controller
 *
 * @property \App\Model\Table\KategoriaTable $Kategoria
 */
class KategoriaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $kategoria = $this->Kategoria->find('all');

        $this->set(compact('kategoria'));
        $this->set('_serialize', ['kategoria']);
    }
	
	public function indexAdmin()
	{
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
		$kategoria = $this->paginate($this->Kategoria);

        $this->set(compact('kategoria'));
        $this->set('_serialize', ['kategoria']);
	}

    /**
     * View method
     *
     * @param string|null $id Kategorium id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kategorium = $this->Kategoria->get($id, [
            'contain' => ['Podkategoria']
        ]);
        $this->set('kategorium', $kategorium);
        $this->set('_serialize', ['kategorium']);
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
        $kategorium = $this->Kategoria->newEntity();
        if ($this->request->is('post')) {
            $kategorium = $this->Kategoria->patchEntity($kategorium, $this->request->data);
            if ($this->Kategoria->save($kategorium)) {
                $this->Flash->success(__('Kategoria została zapisana.'));
                return $this->redirect(['action' => 'indexAdmin']);
            } else {
                $this->Flash->error(__('Kategoria nie mogła zostać zapisana.'));
            }
        }
        $this->set(compact('kategorium'));
        $this->set('_serialize', ['kategorium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Kategorium id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $kategorium = $this->Kategoria->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kategorium = $this->Kategoria->patchEntity($kategorium, $this->request->data);
            if ($this->Kategoria->save($kategorium)) {
                $this->Flash->success(__('Kategoria została zapisana.'));
                return $this->redirect(['action' => 'indexAdmin']);
            } else {
                $this->Flash->error(__('Kategoria nie mogła zostać zapisana.'));
            }
        }
        $this->set(compact('kategorium'));
        $this->set('_serialize', ['kategorium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Kategorium id.
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
        $kategorium = $this->Kategoria->get($id);
        if ($this->Kategoria->delete($kategorium)) {
            $this->Flash->success(__('Kategoria została usinięta.'));
        } else {
            $this->Flash->error(__('Kategoria nie mogła zostać usunięta.'));
        }
        return $this->redirect(['action' => 'indexAdmin']);
    }
}
