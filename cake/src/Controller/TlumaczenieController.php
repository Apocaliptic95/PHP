<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tlumaczenie Controller
 *
 * @property \App\Model\Table\TlumaczenieTable $Tlumaczenie
 */
class TlumaczenieController extends AppController
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
            'contain' => ['Slowo_one'=>['Jezyk'],'Slowo_two'=>['Jezyk']]
        ];
        $tlumaczenie = $this->paginate($this->Tlumaczenie);

        $this->set(compact('tlumaczenie'));
        $this->set('_serialize', ['tlumaczenie']);
    }

    /**
     * View method
     *
     * @param string|null $id Tlumaczenie id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $tlumaczenie = $this->Tlumaczenie->get($id, [
            'contain' => []
        ]);

        $this->set('tlumaczenie', $tlumaczenie);
        $this->set('_serialize', ['tlumaczenie']);
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
        $tlumaczenie = $this->Tlumaczenie->newEntity();
        if ($this->request->is('post')) {
            $tlumaczenie = $this->Tlumaczenie->patchEntity($tlumaczenie, $this->request->data);
            if ($this->Tlumaczenie->save($tlumaczenie)) {
                $this->Flash->success(__('Dodano tłumaczenie.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się dodać tłumaczenia.'));
            }
        }
		$slowo_one = $this->Tlumaczenie->Slowo_one->find('list',['limit' => 200]);
		$slowo_two = $this->Tlumaczenie->Slowo_two->find('list',['limit' => 200]);
        $this->set(compact('tlumaczenie', 'slowo_one', 'slowo_two'));
        $this->set('_serialize', ['tlumaczenie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tlumaczenie id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $tlumaczenie = $this->Tlumaczenie->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tlumaczenie = $this->Tlumaczenie->patchEntity($tlumaczenie, $this->request->data);
            if ($this->Tlumaczenie->save($tlumaczenie)) {
                $this->Flash->success(__('Zapisano tłumaczenie.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać tłumacznia.'));
            }
        }
        $slowo_one = $this->Tlumaczenie->Slowo_one->find('list',['limit' => 200]);
		$slowo_two = $this->Tlumaczenie->Slowo_two->find('list',['limit' => 200]);
        $this->set(compact('tlumaczenie', 'slowo_one', 'slowo_two'));
        $this->set('_serialize', ['tlumaczenie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tlumaczenie id.
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
        $tlumaczenie = $this->Tlumaczenie->get($id);
        if ($this->Tlumaczenie->delete($tlumaczenie)) {
            $this->Flash->success(__('Usunięto tłumaczenie.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć tłumacznia.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
