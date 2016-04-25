<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wynik Controller
 *
 * @property \App\Model\Table\WynikTable $Wynik
 */
class WynikController extends AppController
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
            'contain' => ['Konto', 'Zestaw']
        ];
        $wynik = $this->paginate($this->Wynik);

        $this->set(compact('wynik'));
        $this->set('_serialize', ['wynik']);
    }
	
	public function own()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$id = $this->request->session()->read('Konto.id_konto');
		if($rola_id == '' || $rola_id < 1)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
		$wyniki = $this->Wynik->find('all')
						->where(['Wynik.konto_id' => $id])
						->contain(['Konto','Zestaw']);
        $this->set(compact('wyniki'));
        $this->set('_serialize', ['wyniki']);
    }

    /**
     * View method
     *
     * @param string|null $id Wynik id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $wynik = $this->Wynik->get($id, [
            'contain' => ['Konto', 'Zestaw']
        ]);

        $this->set('wynik', $wynik);
        $this->set('_serialize', ['wynik']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wynik = $this->Wynik->newEntity();
        if ($this->request->is('post')) 
		{
            $wynik = $this->Wynik->patchEntity($wynik, $this->request->data);	
			$wyniki = $this->Wynik->find('all')
						->where(['konto_id'=>$wynik->konto_id, 'zestaw_id' => $wynik->zestaw_id, 'komentarz_wynik' => $wynik->komentarz_wynik]);
			if($wyniki->count() > 0)
				$wynik->id_wynik = $wyniki->first()->id_wynik;
            $this->Wynik->save($wynik);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Wynik id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);	
        $wynik = $this->Wynik->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wynik = $this->Wynik->patchEntity($wynik, $this->request->data);
            if ($this->Wynik->save($wynik)) {
                $this->Flash->success(__('Wynik został zapisany.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Nie udało się zapisać wyniku.'));
            }
        }
        $konto = $this->Wynik->Konto->find('list', ['limit' => 200]);
        $zestaw = $this->Wynik->Zestaw->find('list', ['limit' => 200]);
        $this->set(compact('wynik', 'konto', 'zestaw'));
        $this->set('_serialize', ['wynik']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wynik id.
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
        $wynik = $this->Wynik->get($id);
        if ($this->Wynik->delete($wynik)) {
            $this->Flash->success(__('Usunięto wynik.'));
        } else {
            $this->Flash->error(__('Nie udało się usunąć wyniku.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
