package alda.linear;

import java.util.Iterator;

/* Den f�rsta veckans temauppgift �r �r en praktisk programmerings�vning. Ni ska implementera en enkell�nkad lista som f�ljer ett givet interface som finns h�r i ILearn. Uppgiften kommer att diskuteras p� f�rel�sning 1.
Namnet p� er listklass ska vara MyALDAList och den ska ligga i samma paket som interfacet: alda.linear.
Det ni ska l�mna in p� den h�r uppgiften �r tv� saker: k�llkoden f�r er listklass och f�r nodklassen. Detta blir allts� en eller tv� javafiler beroende p� om ni placerar nodklassen som en inre klass eller inte. 
Filerna ska inte vara packade p� n�got s�tt vid inl�mningen. 
Filerna ska inneh�lla namn och epostadresser till samtliga gruppmedlemmar i en kommentar h�gst upp.
 */

public class MyALDAList<E> implements ALDAList<E> {

	public void add(E element) {
		
	};

	public void add(int index, E element) {
		
	};

	public E remove(int index) {
		return null;
	};

	public boolean remove(E element) {
		return (Boolean) null;
	};

	public E get(int index) {
		return null;
	};

	public boolean contains(E element) {
		return (Boolean) null;
	};

	public int indexOf(E element) {
		return (Integer)null;
	};

	public void clear() {
		
	};

	public int size() {
		return (Integer) null;
	};

	@Override
	public Iterator<E> iterator() {
		// TODO Auto-generated method stub
		return null;
	}

}
