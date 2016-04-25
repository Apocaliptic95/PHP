<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Konto Controller
 *
 * @property \App\Model\Table\KontoTable $Konto
 */
class KontoController extends AppController
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
            'contain' => ['Rola']
        ];
        $konto = $this->paginate($this->Konto);

        $this->set(compact('konto'));
        $this->set('_serialize', ['konto']);
    }

    /**
     * View method
     *
     * @param string|null $id Konto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);		
		
        $konto = $this->Konto->get($id, [
		'contain' => ['Rola', 'Uprawnienia'=>['Podkategoria'], 'Wynik'=>['Zestaw'], 'Zestaw'=>['Jezyk_one','Jezyk_two','Podkategoria']]
        ]);

        $this->set('konto', $konto);
        $this->set('_serialize', ['konto']);
    }
	
	public function login()
    {
        $konto = $this->Konto->newEntity();
        if ($this->request->is('post')) 
		{
			$konto = $this->Konto->patchEntity($konto, $this->request->data);
			$query = $this->Konto->find()
							->where(['Konto.login_konto =' => $konto->login_konto, 'Konto.haslo_konto =' => $konto->haslo_konto])
							->contain(['Rola']);
			if($query->count() == 1)
			{
				$session = $this->request->session();
				$row = $query->first();
				$session->write('Konto.rola_id', $row->rola_id);
				$session->write('Konto.imie_konto', $row->imie_konto);
				$session->write('Konto.nazwisko_konto', $row->nazwisko_konto);
				$session->write('Konto.nazwa_rola', $row->rola->nazwa_rola);
				$session->write('Konto.id_konto', $row->id_konto);
				return $this->redirect(['controller' => 'kategoria','action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('Logowanie nie powiodło się.'));
			}
        }
    }

    public function logout()
    {
        $session = $this->request->session();
		$session->delete('Konto');
		return $this->redirect(['controller' => 'kategoria','action' => 'index']);
    }
	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
	 
    public function add()
    {
        $konto = $this->Konto->newEntity();
        if ($this->request->is('post')) {
            $konto = $this->Konto->patchEntity($konto, $this->request->data);
            if ($this->Konto->save($konto)) {
                $this->Flash->success(__('Konto zostało dodane.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Konto nie mogło zostać dodane.'));
            }
        }
        $rola = $this->Konto->Rola->find('list', ['limit' => 200]);
        $this->set(compact('konto', 'rola'));
        $this->set('_serialize', ['konto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Konto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		if($rola_id == '' || $rola_id < 4)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);		
		
        $konto = $this->Konto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $konto = $this->Konto->patchEntity($konto, $this->request->data);
            if ($this->Konto->save($konto)) {
                $this->Flash->success(__('Konto zostało edytowane.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Konto nie mogło zostać edytowane.'));
            }
        }
        $rola = $this->Konto->Rola->find('list', ['limit' => 200]);
        $this->set(compact('konto', 'rola'));
        $this->set('_serialize', ['konto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Konto id.
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
        $konto = $this->Konto->get($id);
        if ($this->Konto->delete($konto)) {
            $this->Flash->success(__('Konto zostało usunięte.'));
        } else {
            $this->Flash->error(__('Konto nie zostało usunięte.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
