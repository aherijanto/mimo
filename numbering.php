<?php

Function isMonthChange(ByVal processType As String) As Boolean
Dim thisDate As String
Dim ystdDate As String
Dim lastDate As String

Dim recLastMonth As New ADODB.Recordset
Dim recUpdNo As New ADODB.Recordset

Set recLastMonth = Nothing
recLastMonth.Open "SELECT * FROM nomonth", DBConnect, adOpenKeyset, adLockOptimistic

Select Case processType
Case "PO"
   lastDate = Format(recLastMonth!po, "mm")
Case "PU"
   lastDate = Format(recLastMonth!pu, "mm")
Case "DO"
   lastDate = Format(recLastMonth!Do, "mm")
Case "SO"
   lastDate = Format(recLastMonth!so, "mm")
Case "SL"
   lastDate = Format(recLastMonth!sl, "mm")
Case "RT"
   lastDate = Format(recLastMonth!rt, "mm")
Case "RP"
   lastDate = Format(recLastMonth!rp, "mm")
Case "AR"
   lastDate = Format(recLastMonth!ar, "mm")
Case "AP"
   lastDate = Format(recLastMonth!ap, "mm")
Case "MV"
   lastDate = Format(recLastMonth!mv, "mm")
Case "OT"
    lastDate = Format(recLastMonth!OT, "mm")
Case "BN"
   lastDate = Format(recLastMonth!bn, "mm")
Case "GR"
   lastDate = Format(recLastMonth!gr, "mm")
End Select

thisDate = Format(Now, "mm")
ystdDate = Format(Now - 1, "mm")

If thisDate = ystdDate Then
   If thisDate = lastDate Then
      isMonthChange = False
   Else
      isMonthChange = True
   End If
Else
   isMonthChange = True
End If

Dim pomonth As String
Dim pumonth As String
Dim domonth As String
Dim somonth As String
Dim slmonth As String
Dim rtmonth As String
Dim rpmonth As String
Dim armonth As String
Dim apmonth As String
Dim mvmonth As String
Dim bnmonth As String
Dim otmonth As String
Dim grmonth As String

If isMonthChange = True Then
'recLastMonth.Update
Select Case processType
Case "PO"
   pomonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET po = '" & pomonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!po = Format(Now, "dd/mm/yyyy")
Case "PU"
   pumonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET pu = '" & pumonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!pu = Format(Now, "dd/mm/yyyy")
Case "DO"
   domonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET do = '" & domonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!do = Format(Now, "dd/mm/yyyy")
Case "SO"
   somonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET so = '" & somonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!SO = Format(Now, "dd/mm/yyyy")
Case "SL"
   slmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET sl = '" & slmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!SL = Format(Now, "dd/mm/yyyy")
Case "RT"
   rtmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET rt = '" & rtmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!RT = Format(Now, "dd/mm/yyyy")
Case "RP"
   rpmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET rp = '" & rpmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
Case "AR"
   armonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET ar = '" & armonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!AR = Format(Now, "dd/mm/yyyy")
Case "AP"
   apmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET ap = '" & apmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
   'recLastMonth!AP = Format(Now, "dd/mm/yyyy")
Case "MV"
   mvmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET mv = '" & mvmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
Case "BN"
   bnmonth = Format(Date, "yyyy-mm-dd")
   recUpdNo.Open "UPDATE nomonth SET bn = '" & bnmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
Case "OT"
    otmonth = Format(Date, "yyyy-mm-dd")
    recUpdNo.Open "UPDATE nomonth SET ot = '" & otmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic
    
Case "GR"
    grmonth = Format(Date, "yyyy-mm-dd")
    recUpdNo.Open "UPDATE nomonth SET gr = '" & grmonth & "'", DBConnect, adOpenKeyset, adLockOptimistic

End Select
'recLastMonth.Update
End If
End Function

?>