using System.Collections;
using System.Collections.Generic;
using UnityEngine;
/*---- added libraries ----*/
using System;
using System.Net.Http;
using System.Text.RegularExpressions;
using System.Linq;

public class character_data : MonoBehaviour{
	/*---- instancing variables ----*/
	private readonly HttpClient client = new HttpClient();
	public  string id;
	public  string[] info;
	public  string[] stats;
	public  string[] all_condition_values;
	public  List<string> conditions = new List<string>();
	
	public static string[] condition_order = {
	"charm", "deafen", "fatigue", "fright", 
	"grappled", "incapacitated", "invisible", "paralyzed", "petrified", "poison", 
	"prone", "restrained", "stun", "unconcious", "exhaustion"};
	
	/*---- Start is called before the first frame update ----*/
	void Start(){
        //Debug.Log("my id is: " + id);
    }
	
	/*---- functions ----*/
	public async void get_data(string id){
		// this function does the post request and inputs the response into 'status'
		
		var post_data = new Dictionary<string,string>{{"id",id}};
		var content = new FormUrlEncodedContent(post_data);
		var response = await client.PostAsync("http://[IPHERE]/php/get_all_data.php",content);
		var response_string = await response.Content.ReadAsStringAsync();
		
		status(response_string);
	}
	
	void status(string all_data){
		//this function splits up the response from the post request into relevant arrays,
		//and sends all_condition_values into 'get_conditions' for more trimming
		
		all_data = all_data.Replace("<br \\>","-");				//remove html breaks because c# no like
		string [] split_data = Regex.Split(all_data, "--- -");	//split into seperate tables

		info = Regex.Split(split_data[0],"-");					//split info into 'columns'
		info = info.Take(info.Length - 1).ToArray();			//remove last (empty) item
		
		stats = Regex.Split(split_data[1],"-");					//split stats into 'columns'
		stats = stats.Take(stats.Length - 1).ToArray();			//remove last (empty) item
		
		all_condition_values = Regex.Split(split_data[2],"-");		//split stats into 'columns'
		all_condition_values = all_condition_values.Take(all_condition_values.Length - 1).ToArray();//remove last (empty) item
		
		get_conditions();
		
	}
	
	void get_conditions(){
		//this just trims all_condition_values so only relevant (non-null)
		//conditions are added to the list
		
		foreach(string con in all_condition_values){			//for each item in all_condition_values
			if(!(string.IsNullOrEmpty(con)|string.IsNullOrWhiteSpace(con))){//if it isnt empty or whitespace
				int index = Array.IndexOf(all_condition_values, con);//get the index of it
				string con_name = condition_order[index];		//get the name of the condition it represents
				conditions.Add(con_name);						//append the name to the conditions list
			}
		}
		
	}
}
 
