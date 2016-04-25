<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ZestawController extends AppController
{
    public function index()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		if($rola_id == '' || $rola_id < 1)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);
		
        $this->paginate = [
            'contain' => ['Konto', 'Podkategoria', 'Jezyk_one', 'Jezyk_two']
        ];
		
		if($rola_id == 1 || $rola_id == 2)
		{
			$query = $this->Zestaw->find('all', ['conditions' => ['Zestaw.konto_id =' => $konto_id]]);
		}
		else if($rola_id == 3)
		{
			$table = TableRegistry::get('Uprawnienia');
			$uprawnienia = $table->find()
				->where(['Uprawnienia.konto_id =' => $konto_id])
				->select(['podkategoria_id']);
			
			$query = $this->Zestaw->find()
				->where(['Zestaw.konto_id =' => $konto_id])
				->orWhere(['podkategoria_id IN' => $uprawnienia, 'prywatny_zestaw' => false]);
		}
		else if($rola_id == 4)
		{
			$query = $this->Zestaw->find();
		}
		
        $zestaw = $this->paginate($query);
		
        $this->set(compact('zestaw','user'));
        $this->set('_serialize', ['zestaw']);
    }

    public function view($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		$zestaw = $this->Zestaw->get($id, [
					'contain' => ['Podkategoria'=>['Kategoria'],'Jezyk_one','Jezyk_two', 'Zestawienie' => ['Tlumaczenie'=>['Slowo_one','Slowo_two']]]
        ]);	
        	 
        $this->set('zestaw', $zestaw);
        $this->set('_serialize', ['zestaw']);
    }
	
	public function alg1($id = null,$type = 1)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		$zestaw = $this->Zestaw->get($id, [
					'contain' => ['Podkategoria'=>['Kategoria'],'Jezyk_one','Jezyk_two', 'Zestawienie' => ['Tlumaczenie'=>['Slowo_one','Slowo_two'],'sort'=>'rand()']]
        ]);	
        	 
        $this->set(compact('zestaw', 'type'));
        $this->set('_serialize', ['zestaw']);
    }
	
	public function alg2($id = null, $type = 1)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		$zestaw = $this->Zestaw->get($id, [
					'contain' => ['Podkategoria'=>['Kategoria'],'Jezyk_one','Jezyk_two', 'Zestawienie' => ['Tlumaczenie'=>['Slowo_one','Slowo_two'],'sort'=>'rand()']]
        ]);	
        	 
        $this->set(compact('zestaw', 'type'));
        $this->set('_serialize', ['zestaw']);
    }
	
	public function alg3($id = null, $type = 1)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		$zestaw = $this->Zestaw->get($id, [
					'contain' => ['Podkategoria'=>['Kategoria'],'Jezyk_one','Jezyk_two', 'Zestawienie' => ['Tlumaczenie'=>['Slowo_one','Slowo_two'],'sort'=>'rand()']]
        ]);	
        	 
        $this->set(compact('zestaw', 'type'));
        $this->set('_serialize', ['zestaw']);
    }
	
	public function test($id = null, $type = 1)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		$zestaw = $this->Zestaw->get($id, [
					'contain' => ['Podkategoria'=>['Kategoria'],'Jezyk_one','Jezyk_two', 'Zestawienie' => ['Tlumaczenie'=>['Slowo_one','Slowo_two'],'sort'=>'rand()']]
        ]);	
		
		if ($this->request->is('post')) 
		{
            $poprawnych = $this->request->data['ok'];
			$poprawne = $this->request->data['all'];
		}
        $this->set(compact('zestaw', 'type'));
        $this->set('_serialize', ['zestaw']);
    }

    public function add()
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$podkategorie = $this->Zestaw->Konto->podkategorie($konto_id);
		$user = $this->request->session()->read('Konto.nazwa_rola');
		
		if($rola_id == '' || $rola_id < 1)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);
		
		if($rola_id == 1 || $rola_id == 2)
		{
			$query = $this->Zestaw->find()
							->where(['Zestaw.konto_id' => $konto_id]);
		}
		else if($rola_id == 3)
		{		
			$query = $this->Zestaw->find()
				->where(['Zestaw.konto_id =' => $konto_id])
				->orWhere(['podkategoria_id IN' => $podkategorie, 'prywatny_zestaw' => false]);
		}
		else if($rola_id == 4)
		{
			$query = $this->Zestaw->find();
		}
		
        $zestaw = $this->Zestaw->newEntity();
		
		if($rola_id == 1)
		{
			$zestaw->prywatny_zestaw = true;
		}
        
		if ($this->request->is('post')) 
		{
            $zestaw = $this->Zestaw->patchEntity($zestaw, $this->request->data);
			if($rola_id == 1)
			{
				$zestaw->prywatny_zestaw = true;
			}
			$zestaw->konto_id = $konto_id;
			if($zestaw->jezyk_id_one == $zestaw->jezyk_id_two)
			{
				$this->Flash->error(__('Języki nie mogą być takie same.'));
			}		
			else
			{
				$wordcount = 0;
				foreach(preg_split("/((\r?\n)|(\r\n?))/", $zestaw->slowka) as $line)
				{
					$tlumaczenia = explode(';',$line);
					if(count($tlumaczenia) == 2)
					{
						$lang1 = explode(',',$tlumaczenia[0]);
						foreach($lang1 as $word)
						{
							$wordcount++;
						}
					}
				}
				if($wordcount < 5)
				{
					$this->Flash->error(__('Zestaw powinien mieć conajmniej 5 słówek.'));
				}
				else
				{
					$data = $podkategorie->find('all')
						->where(['id_podkategoria' => $zestaw->podkategoria_id]);
					if ($data->count() == 0 && $zestaw->prywatny_zestaw == false)
					{
						$this->Flash->error(__('Zestaw nie może być zapisany do tej podkategorii.'));
					}
					else if ($result = $this->Zestaw->save($zestaw)) 
					{
						$new_zestaw_id = $result->id_zestaw;
						$slowo_table = TableRegistry::get('Slowo');
						$tlumaczenie_table = TableRegistry::get('Tlumaczenie');
						$zestawienie_table = TableRegistry::get('Zestawienie');
						foreach(preg_split("/((\r?\n)|(\r\n?))/", $zestaw->slowka) as $line)
						{
							$tlumaczenia = explode(';',$line);
							if(count($tlumaczenia) == 2)
							{
								$lang1 = explode(',',$tlumaczenia[0]);
								$ex = $slowo_table->getIndex($tlumaczenia[1]);
								if($ex == -1)
								{
									$slowo1 = $slowo_table->newEntity();
									$slowo1->jezyk_id = $zestaw->jezyk_id_two;
									$slowo1->nazwa_slowo = $tlumaczenia[1];
									$slowo1_result = $slowo_table->save($slowo1);
									$slowo1_id = $slowo1_result->id_slowo;
								}
								else
								{
									$slowo1_id = $ex;
								}
								foreach($lang1 as $word)
								{
									$ex = $slowo_table->getIndex($word);
									if($ex == -1)
									{
										$slowo2 = $slowo_table->newEntity();
										$slowo2->jezyk_id = $zestaw->jezyk_id_one;
										$slowo2->nazwa_slowo = $word;
										$slowo2_result = $slowo_table->save($slowo2);
										$slowo2_id = $slowo2_result->id_slowo;
									}
									else
									{
										$slowo2_id = $ex;
									}
									
									$ex = $tlumaczenie_table->getIndex($slowo2_id,$slowo1_id);
									if($ex == -1)
									{
										$tlumaczenie = $tlumaczenie_table->newEntity();
										$tlumaczenie->slowo_id_one = $slowo2_id;
										$tlumaczenie->slowo_id_two = $slowo1_id;
										$tlumaczenie_result = $tlumaczenie_table->save($tlumaczenie);
										$tlumaczenie_id = $tlumaczenie_result->id_tlumaczenie;
									}
									else
									{
										$tlumaczenie_id = $ex;
									}
									
									$zestawienie = $zestawienie_table->newEntity();
									$zestawienie->zestaw_id = $new_zestaw_id;
									$zestawienie->tlumaczenie_id = $tlumaczenie_id;
									$zestawienie_table->save($zestawienie);
								}
							}
						} 
						$this->Flash->success(__('Zestaw został zapisany.'));
						return $this->redirect(['action' => 'index']);
					} else {
						$this->Flash->error(__('Zestaw nie może być zapisany. Spróbuj ponownie.'));
					}
				}
			}
        }
        $konto = $this->Zestaw->Konto->find('list', ['limit' => 200]);		
		$podkategoria = $this->Zestaw->Podkategoria->find('list')
						->where(['id_podkategoria IN' => $podkategorie]);				
		$podkategoria2 = $this->Zestaw->Podkategoria->find()
						->where(['id_podkategoria NOT IN' => $podkategorie]);
		$concat = $podkategoria2->func()->concat(['nazwa_podkategoria'=>'identifier',' - Tylko Prywatnie']);
		$podkategoria2->select(['id_podkategoria',$concat]);
		$podkategoria->union($podkategoria2);
		$jezyk_one = $this->Zestaw->Jezyk_one->find('list',['limit' => 200]);
		$jezyk_two = $this->Zestaw->Jezyk_two->find('list',['limit' => 200]);
        $this->set(compact('zestaw', 'konto', 'podkategoria', 'jezyk_one', 'jezyk_two', 'user', 'rola_id'));
        $this->set('_serialize', ['zestaw']);
    }

    public function edit($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		$podkategorie = $this->Zestaw->Konto->podkategorie($konto_id);
		
		if($rola_id == '' || $rola_id < 1)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);
		
		if($rola_id == 1 || $rola_id == 2)
		{
			$query = $this->Zestaw->find()
							->where(['Zestaw.konto_id' => $konto_id]);
		}
		else if($rola_id == 3)
		{
			$query = $this->Zestaw->find()
				->where(['Zestaw.konto_id =' => $konto_id])
				->orWhere(['podkategoria_id IN' => $podkategorie, 'prywatny_zestaw' => false]);
		}
		else if($rola_id == 4)
		{
			$query = $this->Zestaw->find();
		}
		if($query->find('all')->where(['id_zestaw' => $id])->count() == 0)
			return $this->redirect(['controller' => 'zestaw','action' => 'index']);
		
        $zestaw = $this->Zestaw->get($id, [
            'contain' => ['Zestawienie' => ['Tlumaczenie']]
        ]);
        
		if ($this->request->is(['patch', 'post', 'put'])) 
		{
            $zestaw = $this->Zestaw->patchEntity($zestaw, $this->request->data);
			if($rola_id == 1)
			{
				$zestaw->prywatny_zestaw = true;
			}
			$zestaw->konto_id = $konto_id;	
			$data = $podkategorie->find('all')
				->where(['id_podkategoria' => $zestaw->podkategoria_id]);
			if ($data->count() == 0 && $zestaw->prywatny_zestaw == false)
			{
				$this->Flash->error(__('Zestaw nie może być zapisany do tej podkategorii.'));
			}
            else if ($result = $this->Zestaw->save($zestaw)) 
			{
				$new_zestaw_id = $result->id_zestaw;
				$slowo_table = TableRegistry::get('Slowo');
				$tlumaczenie_table = TableRegistry::get('Tlumaczenie');
				$zestawienie_table = TableRegistry::get('Zestawienie');
				foreach(preg_split("/((\r?\n)|(\r\n?))/", $zestaw->slowka) as $line)
				{
					$tlumaczenia = explode(';',$line);
					if(count($tlumaczenia) == 2)
					{
						$lang1 = explode(',',$tlumaczenia[0]);
						$ex = $slowo_table->getIndex($tlumaczenia[1]);
						if($ex == -1)
						{
							$slowo1 = $slowo_table->newEntity();
							$slowo1->jezyk_id = $zestaw->jezyk_id_two;
							$slowo1->nazwa_slowo = $tlumaczenia[1];
							$slowo1_result = $slowo_table->save($slowo1);
							$slowo1_id = $slowo1_result->id_slowo;
						}
						else
						{
							$slowo1_id = $ex;
						}
						foreach($lang1 as $word)
						{
							$ex = $slowo_table->getIndex($word);
							if($ex == -1)
							{
								$slowo2 = $slowo_table->newEntity();
								$slowo2->jezyk_id = $zestaw->jezyk_id_one;
								$slowo2->nazwa_slowo = $word;
								$slowo2_result = $slowo_table->save($slowo2);
								$slowo2_id = $slowo2_result->id_slowo;
							}
							else
							{
								$slowo2_id = $ex;
							}
							
							$ex = $tlumaczenie_table->getIndex($slowo2_id,$slowo1_id);
							if($ex == -1)
							{
								$tlumaczenie = $tlumaczenie_table->newEntity();
								$tlumaczenie->slowo_id_one = $slowo2_id;
								$tlumaczenie->slowo_id_two = $slowo1_id;
								$tlumaczenie_result = $tlumaczenie_table->save($tlumaczenie);
								$tlumaczenie_id = $tlumaczenie_result->id_tlumaczenie;
							}
							else
							{
								$tlumaczenie_id = $ex;
							}
							
							$zestawienie = $zestawienie_table->newEntity();
							$zestawienie->zestaw_id = $new_zestaw_id;
							$zestawienie->tlumaczenie_id = $tlumaczenie_id;
							$zestawienie_table->save($zestawienie);
						}
					}
				}
                $this->Flash->success(__('Zestaw został zapisany.'));
                return $this->redirect(['action' => 'index']);
            } 
			else 
			{
                $this->Flash->error(__('Zestaw nie może być zapisany. Spróbuj ponownie.'));
            }
        }
		
        $konto = $this->Zestaw->Konto->find('list', ['limit' => 200]);
        $podkategoria = $this->Zestaw->Podkategoria->find('list')
						->where(['id_podkategoria IN' => $podkategorie]);				
		$podkategoria2 = $this->Zestaw->Podkategoria->find()
						->where(['id_podkategoria NOT IN' => $podkategorie]);
		$concat = $podkategoria2->func()->concat(['nazwa_podkategoria'=>'identifier',' - Tylko Prywatnie']);
		$podkategoria2->select(['id_podkategoria',$concat]);
		$podkategoria->union($podkategoria2);
		$jezyk_one = $this->Zestaw->Jezyk_one->find('list',['limit' => 200]);
		$jezyk_two = $this->Zestaw->Jezyk_two->find('list',['limit' => 200]);
        $this->set(compact('zestaw', 'konto', 'podkategoria', 'jezyk_one', 'jezyk_two', 'user', 'rola_id'));
        $this->set('_serialize', ['zestaw']);
    }

    public function delete($id = null)
    {
		$session = $this->request->session();
		$rola_id = $this->request->session()->read('Konto.rola_id');
		$konto_id = $this->request->session()->read('Konto.id_konto');
		$user = $this->request->session()->read('Konto.nazwa_rola');
		$podkategorie = $this->Zestaw->Konto->podkategorie($konto_id);
		
		if($rola_id == '' || $rola_id < 1)
			return $this->redirect(['controller' => 'kategoria','action' => 'index']);
		
		if($rola_id == 1 || $rola_id == 2 || $rola_id == 3)
		{
			$query = $this->Zestaw->find()
							->where(['Zestaw.konto_id' => $konto_id]);
		}
		else if($rola_id == 4)
		{
			$query = $this->Zestaw->find();
		}
		if($query->find('all')->where(['id_zestaw' => $id])->count() == 0)
			return $this->redirect(['controller' => 'zestaw','action' => 'index']);
		
        $this->request->allowMethod(['post', 'delete']);
        $zestaw = $this->Zestaw->get($id);
        if ($this->Zestaw->delete($zestaw)) {
            $this->Flash->success(__('Zestaw został usunięty.'));
        } else {
            $this->Flash->error(__('Zestaw nie został usunięty.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
