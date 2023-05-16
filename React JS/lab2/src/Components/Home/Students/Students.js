import './Students.css';

let Students = function ({studentsList}) { 
    let RenderStudents = (All)=>{
        if(All.length){
            return All.map((student)=>{
                return (
                    <tr key={student.id}>
                        <td>{student.name}</td>
                        <td>{student.age}</td>
                    </tr>          
                )
            })
        }
        else{
            return(
                <tr>
                    <td colSpan="6">No Data in the Table</td>
                </tr>           
            )
        }
    }

    return (
        <div className="table-container bg-white text col-6 col-md-4 col-lg-3 fs-5">
            <table className="table table-striped text-center alert border">
                <thead className="table-header text-white">
                    <tr>
                        <th colSpan="6" className="text bg-white fs-3">All Students Data</th>
                    </tr>
                    <tr>
                        <th scope="col" className="px-5">Name</th>
                        <th scope="col" className="px-5">Age</th>
                    </tr>
                </thead>
                <tbody>
                    { RenderStudents(studentsList) }
                </tbody>
            </table>         
        </div>                
    )
 } 
 export default Students;