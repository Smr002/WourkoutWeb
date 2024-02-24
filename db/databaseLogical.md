-Admin:
1,Username(Pk)
2,password

-Instruction:
1,InstructionID(Pk)
2,phone number
3,first name
4,last name
5,username
6,password
7,email
8,gender

-gym member:
1,memberid(pk)
2,phone number
3,first name
4,last name
5,username
6,password
7,email
8,gender

-Wourkout Plane:
1,wourkoutPlaneId(Pk)
2,wourkoutType

-DietPlane:
1,dietPlaneId(Pk)
2,dietType

-online chat
InstructionID
gymMember(Fk)
wourkoutPlaneId(Fk)
dietPlane(Fk)(O)

-viewOfWourkout
1, gymMemberId(Fk)
2, wourkoutPlaneId(Fk)
3,verify(true or false)
if is true show the pdf else not you dont have any wourkout

-viewOfDiet
1, gymMemberId(Fk)
2, dietPlaneId(Fk)
3,verify(true or false)
if is true show the pdf else not you dont have any dietPlane



