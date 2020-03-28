using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class object_test : MonoBehaviour{
	
	/*---- this stuff is needed to instance the object ----*/
	public GameObject data;
	GameObject chara;
	character_data chara_data;
	
	// Start is called before the first frame update
    void Start(){
        chara = Instantiate(data);								//instanciate the GameObject
		chara_data = chara.GetComponent<character_data>();		//create an instance of the class character_data
		chara_data.get_data(chara_data.id);						//populate the variables in character_data by using get_data(id)
    }
}
