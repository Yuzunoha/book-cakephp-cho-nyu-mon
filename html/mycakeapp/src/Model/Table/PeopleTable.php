<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table
{
  public function initialize(array $config)
  {
    parent::initialize($config);

    $this->setTable('people');
    $this->setDisplayField('mail');
    $this->setPrimaryKey('id');
  }

  public function findMe(Query $query, array $options)
  {
    $me = $options['me'];
    return $query
      ->where(['name like' => '%' . $me . '%'])
      ->orWhere(['mail like' => '%' . $me . '%'])
      ->order(['age' => 'asc']);
  }

  public function findByAge(Query $query, array $options)
  {
    return $query
      ->order(['age' => 'asc'])
      ->order(['name' => 'asc']);
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->integer('id')
      ->allowEmpty('id', 'create');

    $validator
      ->scalar('name')
      ->requirePresence('name', 'create')
      ->notEmpty('name');

    $validator
      ->scalar('mail')
      ->allowEmpty('mail');

    $validator
      ->integer('age')
      ->requirePresence('age', 'create')
      ->notEmpty('age');

    return $validator;
  }
}
