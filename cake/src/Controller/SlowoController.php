<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Slowo Controller
 *
 * @property \App\Model\Table\SlowoTable $Slowo
 */
class SlowoController extends AppController
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
            'contain' => ['Jezyk']
        ];
        $slowo = $this->paginate($this->Slowo);

        $this->set(compact('slowo'));
        $this->set('_serialize', ['slowo']);
    }

    /**
     * View method
     *
     * @param string|null $id Slowo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $slowo = $this->Slowo->get($id, [
            'contain' => ['Jezyk', 'Zestawienie'=>['Zestaw']]
        ]);

        $this->set('slowo', $slowo);
        $this->set('_serialize', ['slowo']);
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
        $slowo = $this->Slowo->newEntity();
        if ($this->request->is('post')) {
            $slowo = $this->Slowo->patchEntity($slowo, $this->request->data);
            if ($this->Slowo->save($slowo)) {
                $this->Flash->success(__('Zapisano słowo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać słowa.'));
            }
        }
        $jezyk = $this->Slowo->Jezyk->find('list', ['limit' => 200]);
        $this->set(compact('slowo', 'jezyk'));
        $this->set('_serialize', ['slowo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slowo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $slowo = $this->Slowo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slowo = $this->Slowo->patchEntity($slowo, $this->request->data);
            if ($this->Slowo->save($slowo)) {
                $this->Flash->success(__('Zmieniono słowo.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zmienić słowa.'));
            }
        }
        $jezyk = $this->Slowo->Jezyk->find('list', ['limit' => 200]);
        $this->set(compact('slowo', 'jezyk'));
        $this->set('_serialize', ['slowo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slowo id.
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
        $slowo = $this->Slowo->get($id);
        if ($this->Slowo->delete($slowo)) {
            $this->Flash->success(__('Słowo zostało usunięte.'));
        } else {
            $this->Flash->error(__('Słowo nie mogło zostać usunięte.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
