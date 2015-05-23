unit main;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs,LanDocs2Exchange_TLB, StdCtrls, Grids, xmldom, XMLIntf, Buttons,
  msxmldom, XMLDoc, ActnMan, ActnColorMaps, RXCtrls, RXGrids, Mask,
  ToolEdit, ToolWin, ActnCtrls, ActnMenus, ComCtrls,ActiveX, DB, ADODB,
  DBClient, Provider, Xmlxform, DBGrids, MidasLib,Strutils, MemTableEh,
  EnMemTable, DBGridEh, ExtCtrls, DBCtrlsEh, DBLookupEh, EnComboBox;

type
  TForm1 = class(TForm)
    ToolBar1: TToolBar;
    SpeedButton1: TSpeedButton;
    SpeedButton2: TSpeedButton;
    StatusBar1: TStatusBar;
    SpeedButton3: TSpeedButton;
    SpeedButton4: TSpeedButton;
    XMLStorage: TDirectoryEdit;
    XMLDoc: TXMLDocument;
    ClientDataSet1: TClientDataSet;
    DataSource1: TDataSource;
    XMLTransform1: TXMLTransform;
    EnMemTable1: TEnMemTable;
    DBGridEh1: TDBGridEh;
    InBoxTimer: TTimer;
    procedure Button1Click(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure SpeedButton1Click(Sender: TObject);
    procedure SpeedButton2Click(Sender: TObject);
    procedure SpeedButton3Click(Sender: TObject);
    procedure SpeedButton4Click(Sender: TObject);
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
    procedure DBGrid1ColumnMoved(Sender: TObject; FromIndex,
      ToIndex: Integer);
    procedure InBoxTimerOn(Sender: TObject);
  private
    { Private declarations }
    procedure LoadIni;
    procedure SaveIni;
    function GetClmnColor(strColor:string):TColor;
    function GetColCaption(strParam:string):string;
    function GetColLength(strParam:string):integer;
    function GetColTag(strParam:string):string;
    function InsertSeparator(st:string):string;
//    procedure XMLDocToGrid(strXMLName:string);
  public

    { Public declarations }
  end;

var
  Form1: TForm1;
//********************
strAllDocs:TStringList;
iXMLDoc : TXMLDocument;
implementation

{$R *.dfm}

uses
 gVariables,InQueue,XMLProcessing;

procedure TForm1.Button1Click(Sender: TObject);
var FExchange:ILDExchange;
    sl:TStringList;
begin
      FExchange := CoLDExchange.Create;
      FExchange.LogFile := 'g:\Temp\XMLexchange.log';    //Файл ведения лога
      FExchange.LogLevel := 2;  //Уровень детализации лога
      FExchange.ClientSystem := 1;
      FExchange.DBType := 'ADO';
      FExchange.DBAlias := 'landocs3:LD-SM';
      FExchange.DBLogin := 'dba';
      FExchange.DBPassword := 'sql';
      FExchange.EnableSecurity:=FALSE; // без безопасности
      FExchange.Session := 0;
      FExchange.Connect;
      fExchange.ImportOptions:=ioDoNotShowRegCard; //не будем показывать карточку

      FExchange.FileLocation := 'g:\work\';    //путь для размещения временных файлов
      sl:=TStringList.Create;
      sl.LoadFromFile('G:\work\inbox-sm.xml'); //читаем XML
      FExchange.ImportDocument(sl.Text,0);  //загрузка документа
      sl.Free;
end;
//***************************************************
function TForm1.InsertSeparator(st:string):string;
var
  pos:integer;
begin
  pos:= AnsiPos('/n',st);
  if (pos) > 0 then begin
    st[pos] := #13;
    st[pos+1] := #10;
  end;
  result := st;
end;
//***************************************************
(*
procedure TForm1.XMLDocToGrid(strXMLName:string);
var
 doc:IXMLDocument;
 xmlNode : IXMLNode;
 rowPos : integer;
 strRow : TStrings;
 tmp,tmptag:string;
begin

  doc := TXMLDocument.Create(nil);
  doc.LoadFromFile(strXMLName);
  strRow := TStringList.Create;
//  IXMLDoc. LoadFromFile(strXMLName);
  xmlNode := doc.DocumentElement.ChildNodes[0];
  tmp := xmlNode.GetText;
  rowPos := 1;
  while rowPos <= strColTags.Count do begin
   tmptag := strColTags[rowPos-1];
   tmp :=  xmlNode.ChildNodes[strColTags[rowPos-1]].Text;
   strRow.Add(tmp);
   Inc(rowPos);
  end;
//  StringGrid1.RowCount := iRowPos+1;
//  StringGrid1.Rows[iRowPos] := strRow;
  Inc(iRowPos);
  FreeAndNil(doc);
  strRow.free;
end;
*)
//***************************************************
function TForm1.GetColCaption(strParam:String):string;
var
 iFirstPos:integer;
begin
  iFirstPos := pos('=',strParam);
  try
    GetColCaption := Copy(strParam,1,iFirstPos-1);
  except
    GetColCaption := 'none';
  end;
end;
//***************************************************
function TForm1.GetColLength(strParam:String):integer;
var
 iFirstPos,iEndPos:integer;
 strNumber:string;
begin
  iFirstPos := pos('=',strParam);
  iEndPos := pos(',',strParam);
  try
    strNumber := Copy(strParam,iFirstPos+1,iEndPos-iFirstPos-1);
    GetColLength := StrToInt(strNumber);
  except
    GetColLength := 40;
  end;
end;
//***************************************************
function TForm1.GetColTag(strParam:String):string;
var
 iFirstPos:integer;
begin
  iFirstPos := pos(',',strParam);
  try
    GetColTag := Copy(strParam,iFirstPos+1,Length(strParam)-iFirstPos);
  except
    GetColTag := 'none';
  end;
end;
procedure TForm1.LoadIni;
var
  strIniFile:TStrings;
  iColCount: integer;
  clmn : TColumnEh;
  strT :string;
  iCount : integer;
begin
  strIniFile:=TStringList.Create;
  iColCount := 1;
//** загрузка -ini файла
  try
    strIniFile.LoadFromFile('XMLExchange.ini');
  except
    Application.MessageBox('Файл XMLExchange.ini не найден',
                            'Ошибка',MB_ICONERROR+MB_OK);
    Application.Terminate;
  end;
//** установка путей
  gPATH := strIniFile.Values['Path'];
  gPATH_TEMPLATE := strIniFile.Values['Path_Template'];
  gPATH_STORAGE := strIniFile.Values['Path_Storage'];
//** установка заголовков для кнопок
  SpeedButton1.Caption := InsertSeparator(strIniFile.Values['Ctrl1']);
  SpeedButton2.Caption := InsertSeparator(strIniFile.Values['Ctrl2']);
  SpeedButton3.Caption := InsertSeparator(strIniFile.Values['Ctrl3']);
  SpeedButton4.Caption := InsertSeparator(strIniFile.Values['Ctrl4']);
//** установка периода опроса директории входящих сообщений
//  InBoxTimer.Interval := StrToInt(strIniFile.Values['InBoxTimer']);
//  InBoxTimer.Enabled := true;

  strT := strIniFile.Values[intToStr(iColCount)];
  while ( strT <> '') do begin
    clmn := DBGridEh1.Columns.Add;
    clmn.FieldName := strT;
    clmn.Title.Caption := strIniFile.Values[strT];
    clmn.Color := GetClmnColor(strIniFile.Values['ColumnColor']);
    clmn.Width := StrToInt(strIniFile.Values[intToStr(iColCount)+strT]);
    inc(iColCount);
    strT := strIniFile.Values[intToStr(iColCount)];
  end;

  Form1.Width := StrToInt(strIniFile.Values['Width']);
  Form1.Height := StrToInt(strIniFile.Values['Height']);
  strIniFile.Free;
end;
//*******************************************
procedure TForm1.SaveIni;
var
  strIniFile:TStrings;
  strT:string;
  clmn : TColumn;
  iCount : integer;
begin
  strIniFile:=TStringList.Create;
  try
    strIniFile.LoadFromFile('XMLExchange.ini');
  except
    Application.MessageBox('Файл XMLExchange.ini не найден',
                            'Ошибка',MB_ICONERROR+MB_OK);
    exit;
  end;
//** сохранение директории
  strIniFile.Values['Path'] := gPATH;
//** сохранение настройки ширины столбцов
  for iCount:=0 to DBGridEh1.Columns.Count-1 do begin
    strT := DBGridEh1.Columns[iCount].FieldName;
    strIniFile.Values[intToStr(iCount+1)] := strT;
    strIniFile.Values[intToStr(iCount+1)+strT] := IntToStr(DBGridEh1.Columns[iCount].Width);
  end;
//** сохранение настроек размеров формы
  strIniFile.Values['Width'] := IntToStr(Form1.Width);
  strIniFile.Values['Height'] := IntToStr(Form1.Height);
  strIniFile.SaveToFile('XMLExchange.ini');
  strIniFile.Free;
end;
//*******************************************

function TForm1.GetClmnColor(strColor:string):TColor;
begin
  Result := clSkyBlue;
  if (strColor = 'clInfoBk') then Result :=clInfoBk;
  if (strColor = 'clAqua') then Result :=clAqua;
  if (strColor = 'clBlue') then Result :=clBlue;
  if (strColor = 'clBlack') then Result :=clBlack;
  if (strColor = 'clDkGray') then Result :=clDkGray;
  if (strColor = 'clGray') then Result :=clGray;
  if (strColor = 'clSilver') then Result :=clSilver	;
  if (strColor = 'clActiveBorder') then Result :=clActiveBorder;
  if (strColor = 'cl3DLight') then Result :=cl3DLight;
  if (strColor = 'clYellow') then Result :=clYellow	;
end;

//*******************************************
procedure TForm1.FormCreate(Sender: TObject);
begin
  LoadIni;
  Form1.Caption := 'Модуль сопряжения АПП и ЕИС КВП ПРБ';
//  iXMLDoc := TXMLDocument.Create(self);
//  iXMLDoc.LoadFromFile('E:\Work\Bevalex\81.xml');
    strAllDocs := TStringList.Create;
  XMLTransform1.SourceXmlFile := gPATH_Storage+'Journal.xml';
  ClientDataSet1.XMLData := XMLTransform1.Data;
end;

procedure TForm1.SpeedButton1Click(Sender: TObject);
var
  SR: TSearchRec;
  i,pos,flcount: integer;
  strTmp : string;
  strCurDoc : TStringList;
  Inode:IXMLNode;
  t:TStrings;
begin
  strCurDoc := TStringList.Create;
  strAllDocs.Clear;
  flcount := 0;
// загружаем первый найденный документ
  if FindFirst(gPATH+'*.xml',faAnyFile,SR)=0 then begin
    strAllDocs.LoadFromFile(gPATH+SR.Name);
    inc(flcount);
  end;
  (*
// удаляем закрытие тэга </root>
  for i:=0 to strAllDocs.Count-1 do begin
//    strTmp := strAllDocs.Strings[i];
    strTmp := strAllDocs.Text;
    Delete(strTmp,AnsiPos('</Root>',strTmp),length('</Root>'));
//    strAllDocs.Strings[i] := strTmp;
    strAllDocs.Text := strTmp;
  end;
// добавляем информацию из остальных файлов в директории
  while FindNext(SR)=0 do begin
    inc(flcount);
    strCurDoc.Clear;
    strCurDoc.LoadFromFile(gPATH+SR.Name);
// удаляем ненужные тэги
//    for i:=0 to strCurDoc.Count-1 do begin
//    strTmp := strCurDoc.Strings[i];
      strTmp := strCurDoc.Text;
      Delete(strTmp,AnsiPos('<?xml version="1.0" encoding="windows-1251"?>',strTmp),
                          length('<?xml version="1.0" encoding="windows-1251"?>'));
      Delete(strTmp,AnsiPos('<Root>',strTmp),length('<Root>'));
      Delete(strTmp,AnsiPos('</Root>',strTmp),length('</Root>'));
//      strCurDoc.Strings[i] := strTmp;
//      strAllDocs.Add(strCurDoc.Strings[i]);
      strAllDocs.Text := strAllDocs.Text + strTmp;
//    end;
  end;
  strAllDocs.Add('</Root>');
//  XMLDoc.XML := strAllDocs;
//  XMLDoc.Active := true;
//  Inode := XMLDoc.DocumentElement.ChildNodes['Document'];
//  XMLTransform1.SourceXmlDocument := XMLDoc.DOMDocument;
 *)
//  XMLTransform1.SourceXml := strAllDocs.Text;
//  ClientDataSet1.XMLData := XMLTransform1.Data;

//  DBGridEh1.DataSource := DataSource1;
//  ClientDataSet1.Active:= true;
  FindClose(SR);
  strCurDoc.Free;
  StatusBar1.SimpleText := 'Обработано файлов: '+IntToStr(flcount);
end;

procedure TForm1.SpeedButton2Click(Sender: TObject);
var FExchange:ILDExchange;
    sl:TStringList;
begin
      FExchange := CoLDExchange.Create;
      FExchange.LogFile := 'g:\Temp\XMLexchange.log';    //Файл ведения лога
      FExchange.LogLevel := 2;  //Уровень детализации лога
      FExchange.ClientSystem := 1;
      FExchange.DBType := 'ADO';
      FExchange.DBAlias := 'landocs3:LD-SM';
      FExchange.DBLogin := 'dba';
      FExchange.DBPassword := 'sql';
      FExchange.EnableSecurity:=FALSE; // без безопасности
      FExchange.Session := 0;
      FExchange.Connect;
      fExchange.ImportOptions:=ioDoNotShowRegCard; //не будем показывать карточку

      FExchange.FileLocation := 'g:\work\';    //путь для размещения временных файлов
      sl:=TStringList.Create;
      sl.LoadFromFile('G:\work\inbox-sm.xml'); //читаем XML
      FExchange.ImportDocument(sl.Text,0);  //загрузка документа
      sl.Free;
      StatusBar1.SimpleText := 'Документ загружен';
end;

procedure TForm1.SpeedButton3Click(Sender: TObject);
begin
 XMLStorage.Text := gPATH;
 XMLStorage.DoClick;
 gPATH := XMLStorage.InitialDir+'\';
 SaveIni;
end;

procedure TForm1.SpeedButton4Click(Sender: TObject);
begin
  Form1.Close;
end;
procedure TForm1.FormClose(Sender: TObject; var Action: TCloseAction);
begin
  SaveIni;
  XMLDoc.Free;
  ClientDataSet1.Active := false;
  strAllDocs.Free;
end;

procedure TForm1.DBGrid1ColumnMoved(Sender: TObject; FromIndex,
  ToIndex: Integer);
begin
  SaveIni;
end;

procedure TForm1.InBoxTimerOn(Sender: TObject);
Var
 InQueueThread  : TInboxQueueThread;
begin
//  InQueueThread := TInboxQueueThread.Create(false);
LoadMsgToJournal(gPATH+'I1.xml', 'I1');
end;

initialization
CoInitialize(nil);
finalization
CoUnInitialize;
end.

