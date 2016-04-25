<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Uprawnienia Controller
 *
 * @property \App\Model\Table\UprawnieniaTable $Uprawnienia
 */
class UprawnieniaController extends AppController
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
        $this->paginate = [
            'contain' => ['Konto', 'Podkategoria']
        ];
        $uprawnienia = $this->paginate($this->Uprawnienia);

        $this->set(compact('uprawnienia'));
        $this->set('_serialize', ['uprawnienia']);
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
        $uprawnienium = $this->Uprawnienia->newEntity();
        if ($this->request->is('post')) {
            $uprawnienium = $this->Uprawnienia->patchEntity($uprawnienium, $this->request->data);
            if ($this->Uprawnienia->save($uprawnienium)) {
                $this->Flash->success(__('Dodano uprawnienia.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się dodać uprawnień.'));
            }
        }
        $konto = $this->Uprawnienia->Konto->find('list', ['limit' => 200])
						->where(['rola_id IN' => [2,3]]);
        $podkategoria = $this->Uprawnienia->Podkategoria->find('list', ['limit' => 200]);
        $this->set(compact('uprawnienium', 'konto', 'podkategoria'));
        $this->set('_serialize', ['uprawnienium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Uprawnienium id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $uprawnienium = $this->Uprawnienia->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uprawnienium = $this->Uprawnienia->patchEntity($uprawnienium, $this->request->data);
            if ($this->Uprawnienia->save($uprawnienium)) {
                $this->Flash->success(__('Zapisano uprawnienie.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać uprawnień.'));
            }
        }
        $konto = $this->Uprawnienia->Konto->find('list', ['limit' => 200]);
        $podkategoria = $this->Uprawnienia->Podkategoria->find('list', ['limit' => 200]);
        $this->set(compact('uprawnienium', 'konto', 'podkategoria'));
        $this->set('_serialize', ['uprawnienium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Uprawnienium id.
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
        $uprawnienium = $this->Uprawnienia->get($id);
        if ($this->Uprawnienia->delete($uprawnienium)) {
            $this->Flash->success(__('Usunięto uprawnienia.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć uprawnień.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
