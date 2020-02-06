<?php
use App\Employee; 
use App\Department; 
use App\Title; 
use App\Salary; 

public class Tp1 {

	/**
	 * Trouver les employées de sexe féminin classés par emp_no, limité aux 10 premiers résultats
	 */ 
	public function rqt1() {

	return	Employee::where('gender', 'F')->orderBy('emp_no')->limit(10)->get()

	}
	
	/**
	 * Trouver tous les employés dont le prénom est 'Troy'.
	 */
	public function rqt2() {

	return	Employee::where('first_name', 'Troy')->get();

	}
	
	/**
	 * 
	 * Trouver tous les employés de sexe masculin nés après le 31 janvier 1965 
	 * 
	 * */
	public function rqt3() {
	
	return	Employee::where('gender', 'M')->where('birth_date', '>', '1965-01-31')->get();

	}
	
	
	/**
	 * 
	 * Combien y a t'il de départements 
	 * 	
	 * */
	public function rqt4() {

	return	Department::count();

	
	}
	
	/**
	 * 
	 *  Combien de personnes dont le prénom est 'Richard' sont des femmes
	 * 
	 * */
	public function rqt5() {
	
	return Employee::where('gender', 'F')->where('first_name', 'Richard')->count();


	}
	
		
	/**
	 * 
	 * Combien y a t'il de titre différents d'employés 
	 * 
	 * */
	public function rqt6() {
	
	return	Title::distinct('title')->count;

	}
	
	
	/**
	 * 
	 * Le salaire moyen de l'employé numéro 287323 toute période confondu 
	 * 
	 * */
	public function rqt7() {
	
	return Salary::where('emp_no', '=', '287323')->avg('salary');

	}
	
	
	/**
	 * 
	 * Quel était le titre de Danny Rando le 12 janvier 1990 
	 * 
	 * */
	public function rqt8() {
	
	return Title::join('employees','titles.emp_no','=','employees.emp_no')->where('first_name','=','Danny')->where('last_name','=','Rando')->where('from_date','<','1990-01-12')->where('to_date','>','1990-01-12')->get('title');


	}
	
	/**
	 * 
	 * L'employé qui a eu le salaire maximum de tous les temps, et quel est le montant de ce salaire
	 * 
	 * */
	 public rqt9() {
	
	return  Salary::join('employees', 'salaries.emp_no', '=', 'employees.emp_no')->orderBy('salary', 'DESC')->first();

	 }
	 
	 /**
	  * 
	  * Combien d'employés travaillaient dans le département 'Sales' le 1er Janvier 2000
	  * 
	  */
	  public rqt10() {
		  
	return	Department::join('dept_emp', 'departments.dept_no', '=', 'dept_emp.dept_no')->join('employees', 'dept_emp.emp_no', '=', 'employees.emp_no')->where('dept_name', '=', 'Sales')->where('from_date', '<=', '2000-01-01')->where('to_date', '>=', '2000-01-01')->count()


	  } 
	  
	  /**
	   * Qui est le manager de Martine Hambrick actuellement et quel est son titre
	   */  
	  public rqt11() {
	
	 /*Dept_manager::
	 join('departments', 'dept_manager.dept_no', '=', 'departments.dept_no')
	 ->join('dept_emp', 'dept_emp.emp_no', '=', 'departments.emp_no')
	 ->join('employees a', 'dept_emp.emp_no', '=', 'a.emp_no')
	 ->join('employees b', 'dept_manager.emp_no', '=', 'b.emp_no')
	 ->join('titles', 'titles.emp_no', '=', 'b.emp_no')
	 ->where('b.first_name', 'Martine')
	 ->where('b.last_name', 'Hambrick')
	 ->where('titles.title', 'Manager')
	 ->select('b.first_name')
	 ->select('b.last_name')
	 ->select('titles_title')
	 ->get() 

	
	
	 */

	return Dept_manager::join('departments', 'dept_manager.dept_no', '=', 'departments.dept_no')->join('dept_emp', 'dept_emp.emp_no', '=', 'departments.emp_no')->join('employees a', 'dept_emp.emp_no', '=', 'a.emp_no')->join('employees b', 'dept_manager.emp_no', '=', 'b.emp_no')->join('titles', 'titles.emp_no', '=', 'b.emp_no')->where('b.first_name', 'Martine')->where('b.last_name', 'Hambrick')->where('titles.title', 'Manager')->select('b.first_name')->select('b.last_name')->select('titles_title')->get()


	  }

}
