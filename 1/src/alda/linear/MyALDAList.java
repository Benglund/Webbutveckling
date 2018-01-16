package alda.linear;

import java.util.Iterator;

/* Den första veckans temauppgift är är en praktisk programmeringsövning. Ni ska implementera en enkellänkad lista som följer ett givet interface som finns här i ILearn. Uppgiften kommer att diskuteras på föreläsning 1.
Namnet på er listklass ska vara MyALDAList och den ska ligga i samma paket som interfacet: alda.linear.
Det ni ska lämna in på den här uppgiften är två saker: källkoden för er listklass och för nodklassen. Detta blir alltså en eller två javafiler beroende på om ni placerar nodklassen som en inre klass eller inte. 
Filerna ska inte vara packade på något sätt vid inlämningen. 
Filerna ska innehålla namn och epostadresser till samtliga gruppmedlemmar i en kommentar högst upp.
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
