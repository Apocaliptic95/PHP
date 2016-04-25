<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Podkategoria Controller
 *
 * @property \App\Model\Table\PodkategoriaTable $Podkategoria
 */
class PodkategoriaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */	
	public function indexAdmin()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $this->paginate = [
            'contain' => ['Kategoria']
        ];
        $podkategoria = $this->paginate($this->Podkategoria);

        $this->set(compact('podkategoria'));
        $this->set('_serialize', ['podkategoria']);
    }

    /**
     * View method
     *
     * @param string|null $id Podkategorium id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$konto_id = $this->request->session()->read('Konto.id_konto');
        $podkategorium = $this->Podkategoria->get($id, [
            'contain' => ['Kategoria','Zestaw'=>['Jezyk_one','Jezyk_two','Konto']]
        ]);

        $this->set(compact('podkategorium','konto_id'));
        $this->set('_serialize', ['podkategorium']);
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
        $podkategorium = $this->Podkategoria->newEntity();
        if ($this->request->is('post')) {
            $podkategorium = $this->Podkategoria->patchEntity($podkategorium, $this->request->data);
            if ($this->Podkategoria->save($podkategorium)) {
                $this->Flash->success(__('Podkategoria została zapisana.'));
                return $this->redirect(['action' => 'indexAdmin']);
            } else {
                $this->Flash->error(__('Podkategoria nie mogła zostać zapisana.'));
            }
        }
        $kategoria = $this->Podkategoria->Kategoria->find('list', ['limit' => 200]);
        $this->set(compact('podkategorium', 'kategoria'));
        $this->set('_serialize', ['podkategorium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Podkategorium id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $podkategorium = $this->Podkategoria->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $podkategorium = $this->Podkategoria->patchEntity($podkategorium, $this->request->data);
            if ($this->Podkategoria->save($podkategorium)) {
                $this->Flash->success(__('Podkategoria została zapisana.'));
                return $this->redirect(['action' => 'indexAdmin']);
            } else {
                $this->Flash->error(__('Podkategoria nie mogła zostać zapisana.'));
            }
        }
        $kategoria = $this->Podkategoria->Kategoria->find('list', ['limit' => 200]);
        $this->set(compact('podkategorium', 'kategoria'));
        $this->set('_serialize', ['podkategorium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Podkategorium id.
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
        $podkategorium = $this->Podkategoria->get($id);
        if ($this->Podkategoria->delete($podkategorium)) {
            $this->Flash->success(__('Podkategoria została usunięta.'));
        } else {
            $this->Flash->error(__('Podkategoria nie mogła zostać usunięta.'));
        }
        return $this->redirect(['action' => 'indexAdmin']);
    }
}
