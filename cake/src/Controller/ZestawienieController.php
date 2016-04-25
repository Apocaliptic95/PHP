<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zestawienie Controller
 *
 * @property \App\Model\Table\ZestawienieTable $Zestawienie
 */
class ZestawienieController extends AppController
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
            'contain' => ['Tlumaczenie'=>['Slowo_one','Slowo_two'], 'Zestaw']
        ];
        $zestawienie = $this->paginate($this->Zestawienie);

        $this->set(compact('zestawienie'));
        $this->set('_serialize', ['zestawienie']);
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
        $zestawienie = $this->Zestawienie->newEntity();
        if ($this->request->is('post')) {
            $zestawienie = $this->Zestawienie->patchEntity($zestawienie, $this->request->data);
            if ($this->Zestawienie->save($zestawienie)) {
                $this->Flash->success(__('Zapisano zestawienie.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać zestawienia.'));
            }
        }
        $tlumaczenie = $this->Zestawienie->Tlumaczenie->find('list', ['limit' => 200]);
        $zestaw = $this->Zestawienie->Zestaw->find('list', ['limit' => 200]);
        $this->set(compact('zestawienie', 'tlumaczenie', 'zestaw'));
        $this->set('_serialize', ['zestawienie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zestawienie id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $zestawienie = $this->Zestawienie->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zestawienie = $this->Zestawienie->patchEntity($zestawienie, $this->request->data);
            if ($this->Zestawienie->save($zestawienie)) {
                $this->Flash->success(__('Zapisano zestawienie.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać zestawienia.'));
            }
        }
        $tlumaczenie = $this->Zestawienie->Tlumaczenie->find('list', ['limit' => 200]);
        $zestaw = $this->Zestawienie->Zestaw->find('list', ['limit' => 200]);
        $this->set(compact('zestawienie', 'tlumaczenie', 'zestaw'));
        $this->set('_serialize', ['zestawienie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zestawienie id.
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
        $zestawienie = $this->Zestawienie->get($id);
        if ($this->Zestawienie->delete($zestawienie)) {
            $this->Flash->success(__('Usunięto zestawienie.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć zestawienia.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteWord($id = null,$idZestaw)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $this->request->allowMethod(['post', 'delete']);
		
        $zestawienie = $this->Zestawienie->find('all')
			->where(['id_zestawienie'=>$id])
			->contain(['Zestaw']);
		if($zestawienie->first()->zestaw->ilosc_slowek_zestaw <= 5)
		{
			$this->Flash->error(__('Zestaw musi mieć więcej niż 5 słówek. Zanim usuniesz, dodaj inne słówko.'));
		}
        else if ($this->Zestawienie->delete($zestawienie)) {
            $this->Flash->success(__('Usunięto słowo.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć słowa.'));
        }
        return $this->redirect(['controller' => 'zestaw','action' => 'edit',$idZestaw]);
    }
}
